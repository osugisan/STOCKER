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

Route::get('/', 'Box\BoxController@index')->middleware('auth')->name('box.index');

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
        Route::get('{box}/edit-form', 'BoxController@editForm')-> name('box.edit-form');
        Route::post('{box}/edit', 'BoxController@edit')->name('box.edit');
        Route::get('{box}', 'BoxController@show')-> name('box.show');
        Route::get('{id}/tag-search', 'BoxController@TagIndex')-> name('box.tag-search');
    });
    
Route::prefix('tag')
    ->namespace('Tag')
    ->middleware('auth')
    ->group( function() {
        Route::get('index', 'TagController@index')->name('tag.index');
        Route::post('create', 'TagController@create')->name('tag.create');
        Route::post('{tag}/edit/', 'TagController@edit')->name('tag.edit');
        Route::delete('{id}', 'TagController@delete')->name('tag.delete');
    });

Route::prefix('item')
    ->namespace('Item')
    ->middleware('auth')
    ->group( function() {
        Route::get('new', 'ItemController@new')->name('item.new');
        Route::post('create', 'ItemController@create')->name('item.create');
        Route::get('{item}/edit-form', 'ItemController@editForm')->name('item.edit-form');
        Route::post('{item}/edit', 'ItemController@edit')->name('item.edit');
        Route::post('{item}/delete', 'ItemController@delete')->name('item.delete');
        Route::get('search-form', 'ItemController@searchForm')->name('item.search-form');
        Route::get('search-form', 'ItemController@searchForm')->name('item.search-form');
    });