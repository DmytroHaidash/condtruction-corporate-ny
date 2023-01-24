<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('locale')) {
            $locale = session()->get('locale', config('app.locale'));
        } else {
            $locale = 'uk';
        }

        if (app('router')->currentRouteNamed('admin.*')) {
            app()->setLocale('ru');
        } else {
            app()->setLocale($locale);
        }

        if (app()->getLocale() === 'ru') {
            setlocale(LC_TIME, 'ru_RU.utf-8');
        }
        if (app()->getLocale() === 'en') {
            setlocale(LC_TIME, 'en_US.utf-8');
        }

        if (app()->getLocale() === 'uk') {
            setlocale(LC_TIME, 'uk_UA.utf-8');
        }

        return $next($request);
    }
}
