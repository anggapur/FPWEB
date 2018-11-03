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
	//Admin
	Route::group(['middleware' => 'level:admin'],function(){
		Route::resource('satker','satkerController');
		Route::resource('user','userController');
	});
	//Operator
	Route::group(['middleware' => 'level:operator'],function(){
		Route::resource('amprahan','amprahanController');

		Route::resource('absensiInduk','absensiIndukController');

		Route::resource('absensiSusulan','absensiSusulanController');
		Route::post('absensiSusulan/cekBulanTahun','absensiSusulanController@cekBulanTahun')->name('cekBulanTahun');
		Route::resource('absensiKekurangan','absensiKekuranganController');

		Route::post('pilihBulanTahunPegawaiAmprahan','amprahanController@pilihBulanTahunPegawai')->name('pilihBulanTahunPegawaiAmprahan');
	});

	//Route APi	
	Route::post('pilihBulanTahunPegawai','absensiIndukController@pilihBulanTahunPegawai')->name('pilihBulanTahunPegawai');
	Route::post('pilihBulanTahunPegawaiKekurangan','absensiKekuranganController@pilihBulanTahunPegawai')->name('pilihBulanTahunPegawaiKekurangan');	

});

