<?php

namespace App\Http\Controllers\Front;

use App\Models\Banner;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
        $feedback = Banner::where('id', 3)->first();
        $page = Page::where('slug', 'about')->first();
        return \view ('app.pages.index', compact('page', 'feedback'));
    }

    public function contacts()
    {
        $feedback = Banner::where('id', 3)->first();
        return \view ('app.pages.contacts', compact('feedback'));
    }

    public function thanks()
    {
        return \view ('app.pages.thanks');
    }

    public function privacy()
    {
        $feedback = Banner::where('id', 3)->first();
        $page = Page::where('slug', 'privacy-policy')->first();
        return \view ('app.pages.index', compact('page', 'feedback'));
    }
}
