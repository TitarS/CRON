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

Route::get('/', 'ImageController@index')->name('image.index');

Route::get('/add-image', 'ImageController@add')->name('image.add');

Route::post('/add-image', 'ImageController@store')->name('image.store');

Route::get('image/{name}/{width}/{height}', 'ImageController@show')->name('image.show');
