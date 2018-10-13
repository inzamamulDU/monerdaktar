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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/article-create', 'Web\ArticlecategoryController@create')->name('article.create');
Route::post('/article-create', 'Web\ArticlecategoryController@store')->name('article.store');
Route::get('/article-show', 'Web\ArticlecategoryController@show')->name('article.show');
