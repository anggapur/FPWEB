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

Route::get('template/index','templateCtrl@index');
Route::get('template/login','templateCtrl@login');

Route::get('template/posts', function () {
    return view('posts');
});
Route::get('template/categories', function () {
    return view('categories');
});
Route::get('template/users', function () {
    return view('users');
});
Route::get('template/profile', function () {
    return view('profile');
});
Route::get('template/settings', function () {
    return view('settings');
});
Route::get('template/details', function () {
    return view('details');
});