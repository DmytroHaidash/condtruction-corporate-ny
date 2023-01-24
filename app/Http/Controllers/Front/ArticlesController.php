<?php

namespace App\Http\Controllers\Front;

use App\Http\Resources\ArticlesPaginatedResource;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
        $category = Category::where('id', request()->id)->first();
        $articles = Article::where('category_id', $category->id)->get();

        $feedback = Banner::where('id', 3)->first();
        return \view('app.articles.index', compact('articles', 'category', 'feedback'));
    }

    public function show(Article $article)
    {
        $feedback = Banner::where('id', 3)->first();
        return \view('app.articles.show', compact('article', 'feedback'));
    }

    public function items()
    {
        return response()->json(new ArticlesPaginatedResource(Article::paginate(5)));
    }
}
