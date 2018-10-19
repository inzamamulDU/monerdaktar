<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/products','ProductController');

Route::group(['prefix'=>'products'],function(){
	Route::apiResource('/{product}/reviews','ReviewController');

});*/
Route::get('/user/getAllDoctors/{paginate}', 'Api\UserController@getAllDoctors')->name('user.getDoctors');

Route::apiResource('/article-category', 'Api\ArticleCategoryController');
Route::apiResource('/article', 'Api\ArticleController');

Route::apiResource('/role', 'Api\RoleController');
Route::apiResource('/user', 'Api\UserController');

Route::apiResource('/comment', 'Api\CommentController');
Route::apiResource('/appoinment', 'Api\AppoinmentController');
Route::apiResource('/article-category', 'Api\ArticleCategoryController');
