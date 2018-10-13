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

Route::apiResource('/article-category', 'Api\ArticlecategoryController');
Route::apiResource('/article', 'Api\ArticleController');

Route::apiResource('/role', 'Api\RoleController');
Route::apiResource('/user', 'Api\UserController');