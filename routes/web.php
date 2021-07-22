<?php

use App\Http\Controllers\MainPageController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\CreateANewAdController;
use App\Http\Controllers\DeleteAnAdController;
use App\Http\Controllers\EditAnAdController;

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

Route::get('/', 'MainPageController@index')->name('mainpage');
Route::get('/search', 'MainPageController@search')->name('search');
Route::get('/category/{title}', 'MainPageController@get_ads_by_category')->name('get_ads_by_category');

Auth::routes();

Route::get('/home', 'HomeController@getAdsByUser')->name('home');


Route::get('/ad/create', 'AdController@get_create_view')->name('create');
Route::post('/home', 'AdController@create_ad')->name('create_ad');

Route::get('/ad/{id}', 'AdController@index')->name('ad');

Route::get('/ad/delete/{id}', 'AdController@delete_ad');

Route::get('/ad/edit/{id}', 'AdController@get_edit_view')->name('edit');
Route::post('/ad/{id}', 'AdController@edit_ad')->name('edit_ad');
