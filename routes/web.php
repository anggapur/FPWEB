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


Route::get('template/posts', function () {
    return view('posts');
});
Route::group(['middleware' => 'auth'],function(){
	// Data Pegawai
	Route::get('pegawaiSetting/rekapPegawai','pegawaiController@rekapPegawai');
	Route::get('pegawaiSetting/importPegawai','pegawaiController@formImport');
	Route::post('pegawaiSetting/importDataPegawai','pegawaiController@importDataPegawai');
	Route::resource('dataPegawai','pegawaiController');
	Route::get('getDataPegawai','pegawaiController@anyData')->name('getDataPegawai');
	//rekening
	Route::get('settingRekening/importForm','settingRekening@importForm');
	Route::post('settingRekening/importrekening','settingRekening@importrekening');
	Route::resource('settingRekening','settingRekening');
	Route::get('getDataRekening','settingRekening@anyData')->name('getDataRekening');
	//middleware for login
	Route::resource('profile','profilController');
	Route::resource('personil','personilController');
	//Admin
	Route::group(['middleware' => 'level:admin'],function(){
		Route::resource('satker','satkerController');
		Route::resource('user','userController');
		Route::resource('aturanAbsensi','aturanAbsensiController');
		Route::resource('aturanTunkin','aturanTunkinController');
		Route::get('aturanTunkin/detail/{id}','aturanTunkinController@detail');
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
	//Anggota
	Route::group(['middleware' => 'level:anggota'],function(){
		Route::resource('anggota','anggotaController');
	});
	//Route APi	
	Route::post('pilihBulanTahunPegawai','absensiIndukController@pilihBulanTahunPegawai')->name('pilihBulanTahunPegawai');
	Route::post('pilihBulanTahunPegawaiKekurangan','absensiKekuranganController@pilihBulanTahunPegawai')->name('pilihBulanTahunPegawaiKekurangan');	

});
	Route::get('hasing',function(){
		return bcrypt("123123123");
	});

	// Route::get('login/anggota','anggotaController@loginForm');
	// Route::post('loginAnggota','anggotaController@loginProses');