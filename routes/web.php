<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', 'App\Http\Controllers\AdsController@index')->name('/');

Route::get('/dashboard', 'App\Http\Controllers\AdsController@show')->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';




// Recherche

Route::get('/search', 'App\Http\Controllers\AdsController@search')->name('ads.search');

// Ads

Route::get('/newAd', 'App\Http\Controllers\AdsController@form')->name('newAd');

Route::post('/newAd', 'App\Http\Controllers\AdsController@store')->name('newAd.store');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/profile','App\Http\Controllers\UserController@index');
Route::post('/profile','App\Http\Controllers\UserController@majNameEmail')->name('majNameEmail');

// Update Ads

Route::get('/editAd/{id}','App\Http\Controllers\AdsController@edit')->name('ads.edit');
Route::post('/editAd/{id}','App\Http\Controllers\AdsController@update')->name('ads.update');

// Delete Ads

Route::get('/delete/{id}','App\Http\Controllers\AdsController@destruction')->name('ads.destuction');
Route::post('/delete/{id}','App\Http\Controllers\AdsController@destroy')->name('ads.destroy');

//categories
Route::resource('category', 'App\Http\Controllers\CategoryController');
// Route::get('/category/create', 'App\Http\Controllers\CategoryController@create') -> name('category.create');
// Route::post('/category/store', 'App\Http\Controllers\CategoryController@store') -> name('category.store');