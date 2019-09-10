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

//Route::get('/', function () {
  //  return view('welcome');
//});

Auth::routes();

Route::get('/', 'PagesController@index')->name('index');

Route::get('/pages/about', 'PagesController@about')->name('about');

Route::resource('books','BookController');

Route::get('8000', 'AdminController@index');
