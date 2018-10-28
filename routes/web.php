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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('template/index','templateCtrl@index');
Route::get('template/login','templateCtrl@login');

Route::group(['middleware' => 'auth'],function(){
	//middleware for login
	Route::resource('profile','profilController');
	Route::resource('personil','personilController');

	Route::group(['middleware' => 'level:admin'],function(){
		Route::resource('satker','satkerController');
		Route::resource('user','userController');
	});
});