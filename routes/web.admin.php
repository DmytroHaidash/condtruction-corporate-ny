<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'user.admin'],
], function () {
    Route::get('/', function () {
        return \redirect()->route('admin.articles.index');
    })->name('home');

    Route::resource('articles', 'ArticlesController')->except('show');
    Route::resource('reviews', 'ReviewsController')->except('show');
    Route::resource('categories', 'CategoriesController')->except('show');
    Route::resource('portfolios', 'PortfoliosController')->except('show');
    Route::resource('advantages', 'AdvantagesController')->except('show');
    Route::resource('feedback', 'FeedbackController')->except('create', 'store', 'show');
    Route::resource('pages', 'PagesController')->except('show', 'create', 'store', 'destroy');
  //  Route::resource('banners', 'BannersController')->except('show', 'create', 'store', 'destroy');
    Route::resource('services', 'ServicesController')->except('show');

    Route::group([
        'as' => 'media.',
        'prefix' => 'media',
    ], function () {
        Route::post('upload', 'MediaController@upload')->name('upload');
        Route::delete('{media}', 'MediaController@destroy')->name('destroy');
    });

    Route::group([
        'as' => 'settings.',
        'prefix' => 'settings',
    ], function () {
        Route::get('/', 'SettingsController@index')->name('index');
        Route::patch('/', 'SettingsController@update')->name('update');
    });
});