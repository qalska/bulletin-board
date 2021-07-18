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
Route::get('/category/{title}', 'MainPageController@getAdsByCategory')->name('getAdsByCategory');

Auth::routes();

Route::get('/home', 'HomeController@getAdsByUser')->name('home');


Route::get('/ad/create', 'CreateANewAdController@index')->name('create');
Route::post('/home', 'CreateANewAdController@store')->name('store');

Route::get('/ad/{id}', 'AdController@index')->name('ad');

Route::get('/ad/delete/{id}', 'DeleteAnAdController@deleteAnAd');

Route::get('/ad/edit/{id}', 'EditAnAdController@index')->name('editAnAd');
Route::post('/ad/{id}', 'EditAnAdController@edit')->name('edit');
