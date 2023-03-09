<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('top');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('mypage')
    ->namespace('Mypage')
    ->middleware('auth')
    ->group( function() {
        Route::get('edit-form', 'ProfileController@editForm')->name('mypage.edit-form');
        Route::post('edit', 'ProfileController@edit')->name('mypage.edit');
    });

    Route::prefix('box')
        ->namespace('Box')
        ->middleware('auth')
        ->group( function() {
            Route::get('new', 'BoxController@new')->name('box.new');
            Route::post('create', 'BoxController@create')->name('box.create');
        });