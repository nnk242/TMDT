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

Route::get('/', 'IndexController@welcome')->name('welcome');
Route::get('/chi-tiet/{id}', 'IndexController@info')->name('info');
Route::get('/dat-xe/{id}', 'IndexController@bookcar')->name('bookcar');
Route::post('/dat-xe/{id}', 'IndexController@pbookcar')->name('postbookcar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
