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

        if($request->has('meta')){
            foreach ($request->get('meta') as $key => $meta) {
                $page->meta()->updateOrCreate([
                    'metable_id' => $page->id
                ], [
                    $key => $meta
                ]);
            }
        }
        return \redirect()->route('admin.pages.index')
            ->with('message', 'Successfully updated.');
    }
}
