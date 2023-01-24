<?php

namespace App\Http\Controllers\Front;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        Feedback::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
        ]);
        return \view('app.pages.thanks');
    }
}
