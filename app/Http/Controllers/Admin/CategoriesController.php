<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.categories.index', [
            'categories' => Category::paginate(20),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.categories.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $article = Category::create()->makeTranslation();

        if ($request->hasFile('category')) {
            $article->addMediaFromRequest('category')
                ->toMediaCollection('category');
        }
        return \redirect()->route('admin.categories.index')
            ->with('message', 'Successfully created.');
    }

    /**
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return \view('admin.categories.edit', compact('category'));
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $category->slug = null;
        $category->update();
        $category->updateTranslation();
        if ($request->hasFile('category')) {
            $category->clearMediaCollection('category');
            $category->addMediaFromRequest('category')
                ->toMediaCollection('category');
        }
        return \redirect()->route('admin.categories.index')
            ->with('message', 'Successfully updated.');
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->clearMediaCollection('category');
        $category->delete();
        return \redirect()->route('admin.categories.index')
            ->with('message', 'Successfully deleted.');
    }
}

