<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SettingsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.settings.index', [
            'setting' => Setting::first(),
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->update($request->only('phone', 'phone_additional', 'email', 'facebook', 'instagram',
            'twitter', 'linked_in', 'latitude', 'longitude'));
        $setting->updateTranslation();
        return \redirect()->route('admin.settings.index')
            ->with('message', 'Settings updated.');
    }
}
