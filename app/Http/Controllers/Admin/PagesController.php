<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function index(): View
    {
        return \view('admin.pages.index', [
            'pages' => Page::get(),
        ]);
    }

    public function edit(Page $page)
    {
        return \view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {

        $page->updateTranslation();
        if ($request->hasFile('page')) {
            $page->clearMediaCollection('page');
            $page->addMediaFromRequest('page')
                ->toMediaCollection('page');
        }

        return \redirect()->route('admin.pages.index')
            ->with('message', 'Successfully updated.');
    }
}
