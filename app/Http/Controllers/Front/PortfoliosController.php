<?php

namespace App\Http\Controllers\Front;

use App\Http\Resources\PortfolioPaginatedResource;
use App\Http\Resources\PortfolioResource;
use App\Models\Banner;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfoliosController extends Controller
{
    public function index()
    {
        $feedback = Banner::where('id', 3)->first();

        return \view('app.portfolios.index', compact( 'feedback'));
    }

    public function show(Portfolio $portfolio)
    {
        $feedback = Banner::where('id', 3)->first();
        return \view('app.portfolios.show', compact('portfolio', 'feedback'));
    }

    public function items()
    {
        return response()->json(new PortfolioPaginatedResource(Portfolio::paginate(5)));
    }
}
