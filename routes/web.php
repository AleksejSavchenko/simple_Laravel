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

Route::get('/articles', 'IndexController@index');

Route::get('/article/{id}', 'IndexController@showArticle')->name('showArticle');

Route::get('/', function () {
    return view('welcome');
});
