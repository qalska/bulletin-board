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

Route::get('/', [MainPageController::class, 'index'])->name('mainpage');
Route::get('/search', [MainPageController::class, 'search'])->name('search');
Route::get('/category/{title}', [MainPageController::class, 'getAdsByCategory'])->name('getAdsByCategory');

Auth::routes();

Route::get('/home', 'HomeController@getAdsByUser')->name('home');
Route::get('/ad/{id}', [AdController::class, 'index'])->name('ad');
Route::get('/ad/create', [CreateANewAdController::class, 'index'])->name('create');
Route::post('/home', [CreateANewAdController::class, 'store'])->name('store');
Route::get('/ad/delete/{id}', [DeleteAnAdController::class, 'deleteAnAd']);
Route::get('/ad/edit/{id}', [EditAnAdController::class, 'index'])->name('editAnAd');
Route::post('/ad/{id}', [EditAnAdController::class, 'edit'])->name('edit');