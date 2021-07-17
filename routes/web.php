<?php

use App\Http\Controllers\MainPageController;
use App\Http\Controllers\CreateANewAdController;

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

Route::get('/', [MainPageController::class, 'index'])->name('mainpage');
Route::get('/search', [MainPageController::class, 'search'])->name('search');
Route::get('/category/{title}', [MainPageController::class, 'getAdsByCategory'])->name('getAdsByCategory');

Auth::routes();

Route::get('/home', 'HomeController@getAdsByUser')->name('home');
Route::post('/ad/create', [CreateANewAdController::class, ['index', 'CreateANewAd']]);
