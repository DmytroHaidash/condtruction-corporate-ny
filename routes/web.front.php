<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'app.',
    'namespace' => 'Front',
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/', 'FeedbackController@store')->name('feedback.store');
    Route::post('locale', 'LocalesController')->name('locale');

    /** Articles */
    Route::group([
        'as' => 'articles.',
        'prefix' => 'articles',
    ], function () {
        Route::get('/', 'ArticlesController@index')->name('index');
        Route::get('items', 'ArticlesController@items');
        Route::get('{article}', 'ArticlesController@show')->name('show');
    });

    Route::group([
        'as' => 'portfolios.',
        'prefix' => 'portfolio'
    ], function (){
       Route::get('/', 'PortfoliosController@index')->name('index');
       Route::get('items', 'PortfoliosController@items');
       Route::get('{portfolio}', 'PortfoliosController@show')->name('show');
    });

    Route::group([
        'as' => 'services.',
        'prefix' => 'services',
    ], function () {
        Route::get('/', 'ServicesController@index')->name('index');
        Route::get('items', 'ServicesController@items');
        Route::get('{service}', 'ServicesController@show')->name('show');
    });


   // Route::get('blog', 'BlogController@index')->name('blog');
    Route::get('about', 'PagesController@about')->name('pages.about');
    Route::get('contacts', 'PagesController@contacts')->name('pages.contacts');
    Route::get('thanks', 'PagesController@thanks')->name('pages.thanks');
    Route::get('privacy-policy', 'PagesController@privacy')->name('pages.privacy');
});
