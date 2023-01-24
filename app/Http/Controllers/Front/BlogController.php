<?php

namespace App\Http\Controllers\Front;

use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $feedback = Banner::where('id', 3)->first();
        $blog = Category::get();
        return \view('app.blog.index', compact('blog', 'feedback'));
    }
}
