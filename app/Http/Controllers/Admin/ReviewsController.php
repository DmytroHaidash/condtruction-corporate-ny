<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ReviewsController extends Controller
{
    public function index(): View
    {
        $reviews = Review::query()->paginate(20);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function create(): View
    {
        return view('admin.reviews.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $review = Review::query()->create()->makeTranslation();
        return \redirect()->route('admin.reviews.index')
            ->with('message', 'Successfully created.');
    }

    public function edit(Review $review): View
    {
        return \view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review): RedirectResponse
    {
        $review->slug = null;
        $review->update();
        $review->updateTranslation();
        return \redirect()->route('admin.reviews.index')
            ->with('message', 'Successfully updated.');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return \redirect()->route('admin.reviews.index')
            ->with('message', 'Successfully deleted.');
    }
}
