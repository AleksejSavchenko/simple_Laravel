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

Route::get('/articles/add', 'IndexController@addArticle');

Route::post('/articles/add', 'IndexController@saveArticle')->name('saveArticle');

Route::delete('articles/delete/{article}', function(\App\Article $article){
//    $article = \App\Article::where('id', $article)->first(); // Еще один вариант реализации метода удаления
    $article->delete();
    return redirect('/articles');
})->name('deleteArticle');

Route::get('/', function () {
    return view('welcome');
});
