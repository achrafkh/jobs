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

Route::get('/', 'MainController@index');

Route::get('/application/{type}', 'MainController@show');
Route::post('/application/submit/{type}', 'MainController@handleSubmit');
Route::post('/application/validate', 'MainController@validateForm');

Route::post('/submit', 'MainController@submit');
