<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class LocalesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return RedirectResponse
     */
    public function __invoke(): RedirectResponse
    {

        $lang = strtolower(request()->get('locale'));
        if ($lang == 'ua') {
            $lang = 'uk';
        }
        if (in_array($lang, config('app.locales'))) {
            app()->setLocale($lang);
            session()->put('locale', $lang);
        }
        return \back();
    }
}
