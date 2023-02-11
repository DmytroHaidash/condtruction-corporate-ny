<?php

namespace App\Http\Controllers\Front;

use App\Http\Resources\ServicesPaginatedResource;
use App\Models\Banner;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::get();
        $feedback = Banner::where('id', 3)->first();
        return \view('app.services.index', compact('services', 'feedback'));
    }

    public function show(Service $service)
    {
        $feedback = Banner::where('id', 3)->first();
        return \view('app.services.show', compact('service', 'feedback'));
    }

    public function items()
    {
        return response()->json(new ServicesPaginatedResource(Service::paginate(10)));
    }
}
