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

Route::get('/appoinment/{role_id}/{user_id}', 'Api\AppoinmentController@appointmentList')->name('appointment.appointmentList');
Route::post('/user/getUserDetails', 'Api\UserController@getUserDetails')->name('user.getUserDetails');

Route::post('/doctor-info/getSelectedDoctorInfo', 'Api\DoctorInfoController@getSelectedDoctorInfo')->name('doctorInfo.getSelectedDoctorInfo');
Route::get('/doctor-info/getDoctorInfoList/{limit}', 'Api\DoctorInfoController@getDoctorInfoList')->name('doctorInfo.getDoctorInfoList');

Route::apiResource('/article-category', 'Api\ArticleCategoryController');
Route::apiResource('/article', 'Api\ArticleController');

Route::apiResource('/role', 'Api\RoleController');
Route::apiResource('/doctor-info', 'Api\DoctorInfoController');
Route::apiResource('/patient-info', 'Api\PatientInfoController');

Route::apiResource('/user', 'Api\UserController');

Route::apiResource('/comment', 'Api\CommentController');
Route::apiResource('/appoinment', 'Api\AppoinmentController');
Route::apiResource('/article-category', 'Api\ArticleCategoryController');
Route::apiResource('/oauth-clients', 'Api\OAuthClientsController');
