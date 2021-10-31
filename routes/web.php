<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('clients')->group(function () {
    Route::get('/', 'ClientController@index')->name('clients.index');
    Route::get('/create', 'ClientController@create')->name('clients.create');
    Route::post('/store', 'ClientController@store')->name('clients.store');
    Route::get('/export', 'ClientController@export')->name('clients.export');
});
Route::prefix('typeahead')->group(function () {
    Route::get('nationality', 'SearchController@getNationalityTypeahead')->name('nationality.typeahead');
});
