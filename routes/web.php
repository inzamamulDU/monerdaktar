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


Auth::routes();
Route::get('/user-getdoctors/{limit}/{page}', 'Web\UserController@getDoctors')->name('user.getdoctors');
Route::get('/', 'HomeController@welcome')->name('home.welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/appoinment', 'Web\AppoinmentController');

Route::get('/articlecategory-create', 'Web\ArticlecategoryController@create')->name('articlecategory.create');
Route::post('/articlecategory-create', 'Web\ArticlecategoryController@store')->name('articlecategory.store');
Route::get('/articlecategory-show', 'Web\ArticlecategoryController@show')->name('article.show');

Route::get('/user-show', 'Web\UserController@show')->name('user.show');
Route::get('/user-create', 'Web\UserController@create')->name('user.create');
Route::post('/user-create', 'Web\UserController@store')->name('user.store');
Route::get('/user-edit', 'Web\UserController@edit')->name('user.edit');
Route::post('/user-update', 'Web\UserController@update')->name('user.update');