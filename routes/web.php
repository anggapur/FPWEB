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

Route::get('download/{filename}', function($filename)
{
    // Check if file exists in app/storage/file folder
    $file_path = public_path()."/".$filename;
    if (file_exists($file_path))
    {
        // Send Download
        return Response::download($file_path, $filename, [
            'Content-Length: '. filesize($file_path)
        ]);
    }
    else
    {
        // Error
        //return $file_path;
        exit('Requested file does not exist on our server!');
    }
})
->where('filename', '[A-Za-z0-9\-\_\.]+');
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
	// Data Satker
	Route::get('dataSatker/editOwnSatker','satkerController@editOwnSatker');
	Route::post('dataSatker/importDataSatker','satkerController@importDataSatker');
	Route::get('dataSatker/importSatker','satkerController@formImport');
	Route::resource('dataSatker','satkerController');		
	Route::get('getDataSatker','satkerController@anyData')->name('getDataSatker');
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
		Route::get('mutasiSetting/mutasiViewAdmin','mutasiController@mutasiViewAdmin');
	});
	//Operator
	Route::group(['middleware' => 'level:operator'],function(){
		
		Route::resource('amprahan','amprahanController');

		Route::resource('absensiInduk','absensiIndukController');

		Route::resource('absensiSusulan','absensiSusulanController');
		Route::post('absensiSusulan/cekBulanTahun','absensiSusulanController@cekBulanTahun')->name('cekBulanTahun');
		Route::resource('absensiKekurangan','absensiKekuranganController');

		Route::post('pilihBulanTahunPegawaiAmprahan','amprahanController@pilihBulanTahunPegawai')->name('pilihBulanTahunPegawaiAmprahan');
		//Mutasi
		Route::get('mutasiSetting/kirimMutasi','mutasiController@kirimMutasi');
		Route::get('mutasiSetting/terimaMutasi','mutasiController@terimaMutasi');
		Route::post('mutasiSetting/terima','mutasiController@terima');
		Route::resource('mutasiSetting','mutasiController');
	});
	//Anggota
	Route::group(['middleware' => 'level:anggota'],function(){
		Route::resource('anggota','anggotaController');
	});
	//Route APi	
	Route::post('pilihBulanTahunPegawai','absensiIndukController@pilihBulanTahunPegawai')->name('pilihBulanTahunPegawai');
	Route::post('pilihBulanTahunPegawaiKekurangan','absensiKekuranganController@pilihBulanTahunPegawai')->name('pilihBulanTahunPegawaiKekurangan');	

	//cetak 1
	Route::get('rekapAbsensi/laporanPerSatker','laporanAbsensi@laporanPerSatker');
	Route::get('laporanAbsensi/laporan1','laporanAbsensi@laporan1');
	Route::post('pilihBulanTahunLaporan','laporanAbsensi@pilihBulanTahun')->name('pilihBulanTahunLaporan');

	Route::get('laporanAbsensi/laporanB','laporanAbsensi@laporanB');
	Route::post('pilihBulanTahunLaporanB','laporanAbsensi@pilihBulanTahunB')->name('pilihBulanTahunLaporanB');
	Route::get('laporanAbsensi/cekLap','laporanAbsensi@cekLap');

	Route::get('laporanAbsensi/laporanSPP','laporanAbsensi@laporanSPP');
	Route::get('laporanAbsensi/laporanSPTJM','laporanAbsensi@laporanSPTJM');
	Route::post('pilihBulanTahunLaporanSPP','laporanAbsensi@pilihBulanTahunSPP')->name('pilihBulanTahunLaporanSPP');

	Route::get('laporanAbsensi/laporanKU','laporanAbsensi@laporanKU');
	Route::post('pilihBulanTahunLaporanKU','laporanAbsensi@pilihBulanTahunKU')->name('pilihBulanTahunLaporanKU');

	//cetak 2
	Route::get('rekapAbsensiSusulan/laporanPerSatkerSusulan','laporanAbsensiSusulan@laporanPerSatkerSusulan');
	Route::get('laporanAbsensiSusulan/laporan1','laporanAbsensiSusulan@laporan1');
	Route::post('pilihBulanTahunLaporanSusulan','laporanAbsensiSusulan@pilihBulanTahun')->name('pilihBulanTahunLaporanSusulan');

	Route::get('laporanAbsensiSusulan/laporanB','laporanAbsensiSusulan@laporanB');
	Route::post('pilihBulanTahunLaporanBSusulan','laporanAbsensiSusulan@pilihBulanTahunB')->name('pilihBulanTahunLaporanBSusulan');
	Route::get('laporanAbsensiSusulan/cekLap','laporanAbsensiSusulan@cekLap');

	Route::get('laporanAbsensiSusulan/laporanSPP','laporanAbsensiSusulan@laporanSPP');
	Route::get('laporanAbsensiSusulan/laporanSPTJM','laporanAbsensiSusulan@laporanSPTJM');
	Route::post('pilihBulanTahunLaporanSPPSusulan','laporanAbsensiSusulan@pilihBulanTahunSPP')->name('pilihBulanTahunLaporanSPPSusulan');

	Route::get('laporanAbsensiSusulan/laporanKU','laporanAbsensiSusulan@laporanKU');
	Route::post('pilihBulanTahunLaporanKUSusulan','laporanAbsensiSusulan@pilihBulanTahunKU')->name('pilihBulanTahunLaporanKUSusulan');

	//cetak 3
	Route::get('rekapAbsensiKekurangan/laporanPerSatkerKekurangan','laporanAbsensiKekurangan@laporanPerSatkerKekurangan');
	Route::get('laporanAbsensiKekurangan/laporan1','laporanAbsensiKekurangan@laporan1');
	Route::post('pilihBulanTahunLaporanKekurangan','laporanAbsensiKekurangan@pilihBulanTahun')->name('pilihBulanTahunLaporanKekurangan');

	Route::get('laporanAbsensiKekurangan/laporanB','laporanAbsensiKekurangan@laporanB');
	Route::post('pilihBulanTahunLaporanBKekurangan','laporanAbsensiKekurangan@pilihBulanTahunB')->name('pilihBulanTahunLaporanBKekurangan');
	Route::get('laporanAbsensiKekurangan/cekLap','laporanAbsensiKekurangan@cekLap');

	Route::get('laporanAbsensiKekurangan/laporanSPP','laporanAbsensiKekurangan@laporanSPP');
	Route::get('laporanAbsensiKekurangan/laporanSPTJM','laporanAbsensiKekurangan@laporanSPTJM');
	Route::post('pilihBulanTahunLaporanSPPKekurangan','laporanAbsensiKekurangan@pilihBulanTahunSPP')->name('pilihBulanTahunLaporanSPPKekurangan');

	Route::get('laporanAbsensiKekurangan/laporanKU','laporanAbsensiKekurangan@laporanKU');
	Route::post('pilihBulanTahunLaporanKUKekurangan','laporanAbsensiKekurangan@pilihBulanTahunKU')->name('pilihBulanTahunLaporanKUKekurangan');

});
	Route::get('hasing',function(){
		return bcrypt("123123123");
	});

	Route::get('tandaTanganSetting/laporan1','TTDController@laporan1');
	Route::get('tandaTanganSetting/laporanB','TTDController@laporanB');
	Route::get('tandaTanganSetting/laporanSPP','TTDController@laporanSPP');
	Route::get('tandaTanganSetting/laporanSPTJM','TTDController@laporanSPTJM');
	Route::get('tandaTanganSetting/laporanKU','TTDController@laporanKU');
	Route::post('tandaTanganSetting/saveData','TTDController@saveData');
	Route::post('tandaTanganSetting/deleteImageTTD','TTDController@deleteImageTTD')->name('deleteImageTTD');
	// Route::get('login/anggota','anggotaController@loginForm');
	// Route::post('loginAnggota','anggotaController@loginProses');