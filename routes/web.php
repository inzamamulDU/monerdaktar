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
Route::get('/appoinment/on-going/{id}', 'Web\AppoinmentController@ongoing')->name('appoinment.ongoing');
Route::get('/user-getdoctors/{limit}/{page}', 'Web\UserController@getDoctors')->name('user.getdoctors');
Route::get('/', 'HomeController@welcome')->name('home.welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/appoinment/get-appointments', 'Web\AppoinmentController@getAppointmentList')->name('appointment.list');
Route::resource('/appoinment', 'Web\AppoinmentController');
Route::post('/doctorinfo/getOnlineDoctors', 'Web\DoctorInfoController@getOnlineDoctors')->name('doctorinfo.getOnlineDoctors');
Route::post('/doctorinfo/getdoctors', 'Web\DoctorInfoController@getDoctorList')->name('doctorinfo.getdoctors');
Route::resource('/doctorinfo', 'Web\DoctorInfoController');
Route::post('/article/get-articles', 'Web\ArticleController@getArticleList')->name('article.list');
Route::resource('/article', 'Web\ArticleController');


Route::get('/articlecategory-create', 'Web\ArticlecategoryController@create')->name('articlecategory.create');
Route::post('/articlecategory-create', 'Web\ArticlecategoryController@store')->name('articlecategory.store');
Route::get('/articlecategory-show', 'Web\ArticlecategoryController@show')->name('article.show');

Route::get('/user-show', 'Web\UserController@show')->name('webuser.show');
Route::get('/user-create', 'Web\UserController@create')->name('webuser.create');
Route::post('/user-create', 'Web\UserController@store')->name('webuser.store');
Route::get('/user-edit', 'Web\UserController@edit')->name('webuser.edit');
Route::post('/user-update', 'Web\UserController@update')->name('webuser.update');

Route::get('/services', 'Web\ServicesController@index')->name('services.index');

Route::get('/about', 'Web\AboutController@index')->name('about.index');