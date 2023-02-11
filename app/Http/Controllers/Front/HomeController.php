<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $advantages = Advantage::get();
        $advantages_banner = Banner::where('id', 2)->first();
        $portfolios = Portfolio::get();
        $feedback = Banner::where('id', 3)->first();
        $about = Page::where('slug', 'about')->first();
        $about['banner'] = Banner::where('id', 1)->first();
        $blog = Article::latest('id')->take(3)->get();
        $services = Service::latest('id')->take(6)->get();

        return view('app.home.index',
            compact('portfolios', 'advantages', 'advantages_banner', 'feedback', 'about', 'blog', 'services'));
    }
}
