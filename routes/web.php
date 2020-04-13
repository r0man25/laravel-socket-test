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

Route::get('/', 'BasicVueLearnController@index');
Route::get('/get-url-data', 'BasicVueLearnController@getUrlData');
Route::get('/get-chart-data', 'BasicVueLearnController@getChartData');
Route::get('/get-random-chart-data', 'BasicVueLearnController@getRandomChartData');
