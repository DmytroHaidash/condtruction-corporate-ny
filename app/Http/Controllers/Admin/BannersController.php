<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannersController extends Controller
{
    public function index()
    {
        return \view('admin.banners.index', [
            'banners' => Banner::latest('id')->get(),
        ]);
    }

    public function edit(Banner $banner)
    {
        return \view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        if ($request->hasFile('banner')) {
            $banner->clearMediaCollection('banner');
            $banner->addMediaFromRequest('banner')
                ->toMediaCollection('banner');
        }

        return \redirect()->route('admin.banners.index')
            ->with('message', 'Successfully updated.');
    }
}
