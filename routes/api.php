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

//Registration
Route::post('registration', 'Webservice\RegistrationController@register')->name('register');
Route::post('registration/activation', 'Webservice\RegistrationController@activation')->name('activation');
Route::post('registration/resend-mail', 'Webservice\RegistrationController@resend_otp')->name('resend.mail');

//Login
Route::post('login', 'Webservice\LoginController@login')->name('login');

//...Forgot Password...
Route::post('password/forgot', 'Webservice\ForgotPasswordController@forgot')->name('password.forgot');
Route::post('password/otp/verify', 'Webservice\ForgotPasswordController@otpVerify')->name('password.otp.verify');	
Route::post('password/reset', 'Webservice\ForgotPasswordController@reset')->name('password.reset');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/user', function (Request $request) {
            return $request->user();
        });
    Route::post('profile/update','ProfileController@update');
    Route::post('password/change','ProfileController@changePassword');
    // Route::get('user/list','Admin\UserController@getList');
    Route::group(['middleware' => ['admin']], function () {
        Route::get('user/list','Admin\UserController@getList');
    });
});

