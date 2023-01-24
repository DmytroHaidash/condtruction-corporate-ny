<?php

namespace App\Providers;

use App\Services\Navigation;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        app()->singleton('nav', function () {
            return new Navigation();
        });
        app()->singleton('settings', function () {
            return Setting::first();
        });
        View::composer(['app.*', 'auth.*'], function () {
            View::share('locales', collect(config('app.locales'))->filter(function ($l) {
                return $l !== app()->getLocale();
            }));
        });
    }
}
