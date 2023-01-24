<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PortfolioSavingRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Spatie\MediaLibrary\Models\Media;

class PortfoliosController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.portfolios.index', [
            'portfolios' => Portfolio::paginate(20),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.portfolios.create');
    }

    /**
     * @param PortfolioSavingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PortfolioSavingRequest $request)
    {

        $portfolio = Portfolio::create()->makeTranslation();
        if($request->has('video')){
            $portfolio->update($request->only('video'));
        }

        if ($request->hasFile('portfolio')) {
            $portfolio->addMediaFromRequest('portfolio')
                ->toMediaCollection('portfolio');
        }
        $this->handleMedia($request, $portfolio);
        return \redirect()->route('admin.portfolios.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Portfolio $portfolio
     * @return View
     */
    public function edit(Portfolio $portfolio): View
    {
        return \view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * @param PortfolioSavingRequest $request
     * @param Portfolio $portfolio
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PortfolioSavingRequest $request, Portfolio $portfolio)
    {

        $portfolio->slug = null;
        $portfolio->update();
        $portfolio->updateTranslation();
        if($request->has('video')){
            $portfolio->update($request->only('video'));
        }


        if ($request->hasFile('portfolio')) {
            $portfolio->clearMediaCollection('portfolio');
            $portfolio->addMediaFromRequest('portfolio')
                ->toMediaCollection('portfolio');
        }

        $this->handleMedia($request, $portfolio);
        return \redirect()->route('admin.portfolios.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Portfolio $portfolio
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->clearMediaCollection('portfolio');
        $portfolio->delete();
        return \redirect()->route('admin.portfolios.index')
            ->with('message', 'Запись успешно удалена.');
    }


    /**
     * @param Request $request
     * @param Portfolio $portfolio
     */
    private function handleMedia(Request $request, Portfolio $portfolio): void
    {
        if ($request->filled('media')) {
            foreach ($request->input('media') as $media) {
                Media::find($media)->update([
                    'model_type' => Portfolio::class,
                    'model_id' => $portfolio->id,
                ]);
            }
        }
    }
}
