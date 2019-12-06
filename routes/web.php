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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@welcome')->name('welcome');
Auth::routes(['verify' => true]);


/****************************** User Routes *****************************/
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['user']], function () {
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::patch('/profile/update', 'ProfileController@update')->name('profile.update');
	Route::patch('/password/change', 'ProfileController@changePassword')->name('password.change');
});

/************************************ Admin Routes ****************************************/
Route::group([ 'namespace' => 'Admin','middleware' => ['admin']], function () {
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	// User module //
	Route::get('/user/list', 'UserController@getList')->name('user.list');
	Route::post('/user/action/{id}', 'UserController@action')->name('user.action');

	// Setting Module //
	Route::get('/setting/list','SettingController@getList')->name('setting.list');
	Route::get('/setting/edit/{id}','SettingController@edit')->name('setting.edit');
	Route::patch('/setting/update/{id}','SettingController@update')->name('setting.update');
});