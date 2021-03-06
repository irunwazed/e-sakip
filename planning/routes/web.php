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

Route::group(['middleware' => ['checklogin']], function () {

    Route::get('/beranda', 'AdminController@beranda');

    Route::get('/data/satuan', 'SatuanController@index'); //  view
    Route::post('/data/satuan/get-data', 'SatuanController@getData'); // load data
    Route::post('/data/satuan/create', 'SatuanController@create'); // buat data
    Route::post('/data/satuan/update', 'SatuanController@update'); // edit data
    Route::post('/data/satuan/delete', 'SatuanController@delete'); // hapus data

    Route::get('/user', 'UserController@index');
    Route::post('/user/get-data', 'UserController@getData');
    Route::post('/user/create', 'UserController@create');
    Route::post('/user/update', 'UserController@update');
    Route::post('/user/delete', 'UserController@delete');

    Route::get('/kota', 'KotaController@index');
    Route::post('/kota/get-data', 'KotaController@getData');
    Route::post('/kota/create', 'KotaController@create');
    Route::post('/kota/update', 'KotaController@update');
    Route::post('/kota/delete', 'KotaController@delete');

    Route::get('/opd', 'OpdController@index');
    Route::post('/opd/get-data', 'OpdController@getData');
    Route::post('/opd/create', 'OpdController@create');
    Route::post('/opd/update', 'OpdController@update');
    Route::post('/opd/delete', 'OpdController@delete');

    Route::get('/visi', 'VisiController@index');
    Route::post('/visi/get-data', 'VisiController@getData');
    Route::post('/visi/create', 'VisiController@create');
    Route::post('/visi/update', 'VisiController@update');
    Route::post('/visi/delete', 'VisiController@delete');

    Route::get('/visi-penjabaran/{kode}', 'VisiPenjabaranController@index');
    Route::post('/visi-penjabaran/get-data', 'VisiPenjabaranController@getData');
    Route::post('/visi-penjabaran/create', 'VisiPenjabaranController@create');
    Route::post('/visi-penjabaran/update', 'VisiPenjabaranController@update');
    Route::post('/visi-penjabaran/delete', 'VisiPenjabaranController@delete');

    Route::get('/misi/{kode}', 'MisiController@index');
    Route::post('/misi/get-data', 'MisiController@getData');
    Route::post('/misi/create', 'MisiController@create');
    Route::post('/misi/update', 'MisiController@update');
    Route::post('/misi/delete', 'MisiController@delete');

    Route::get('/tujuan/{kode}', 'TujuanController@index');
    Route::post('/tujuan/get-data', 'TujuanController@getData');
    Route::post('/tujuan/create', 'TujuanController@create');
    Route::post('/tujuan/update', 'TujuanController@update');
    Route::post('/tujuan/delete', 'TujuanController@delete');

    Route::get('/tujuan-indikator/{kode}', 'TujuanIndikatorController@index');
    Route::post('/tujuan-indikator/get-data', 'TujuanIndikatorController@getData');
    Route::post('/tujuan-indikator/create', 'TujuanIndikatorController@create');
    Route::post('/tujuan-indikator/update', 'TujuanIndikatorController@update');
    Route::post('/tujuan-indikator/delete', 'TujuanIndikatorController@delete');

    Route::get('/sasaran/{kode}', 'SasaranController@index');
    Route::post('/sasaran/get-data', 'SasaranController@getData');
    Route::post('/sasaran/create', 'SasaranController@create');
    Route::post('/sasaran/update', 'SasaranController@update');
    Route::post('/sasaran/delete', 'SasaranController@delete');

    Route::get('/sasaran-indikator/{kode}', 'SasaranIndikatorController@index');
    Route::post('/sasaran-indikator/get-data', 'SasaranIndikatorController@getData');
    Route::post('/sasaran-indikator/create', 'SasaranIndikatorController@create');
    Route::post('/sasaran-indikator/update', 'SasaranIndikatorController@update');
    Route::post('/sasaran-indikator/delete', 'SasaranIndikatorController@delete');

    Route::get('/sasaran-indikator-triwulan/{kode}', 'SasaranIndikatorTriwulanController@index');
    Route::post('/sasaran-indikator-triwulan/get-data', 'SasaranIndikatorTriwulanController@getData');
    Route::post('/sasaran-indikator-triwulan/create', 'SasaranIndikatorTriwulanController@create');
    Route::post('/sasaran-indikator-triwulan/update', 'SasaranIndikatorTriwulanController@update');
    Route::post('/sasaran-indikator-triwulan/delete', 'SasaranIndikatorTriwulanController@delete');


    Route::get('/opd-rpjmd/{kode}', 'OpdRpjmdController@index');
    Route::post('/opd-rpjmd/get-data', 'OpdRpjmdController@getData');
    Route::post('/opd-rpjmd/create', 'OpdRpjmdController@create');
    Route::post('/opd-rpjmd/update', 'OpdRpjmdController@update');
    Route::post('/opd-rpjmd/delete', 'OpdRpjmdController@delete');

    Route::get('/program/{kode}', 'ProgramController@index');
    Route::post('/program/get-data', 'ProgramController@getData');
    Route::post('/program/create', 'ProgramController@create');
    Route::post('/program/update', 'ProgramController@update');
    Route::post('/program/delete', 'ProgramController@delete');

    Route::get('/renstra-kegiatan/{kode}', 'RenstraKegiatanController@index');
    Route::post('/renstra-kegiatan/get-data', 'RenstraKegiatanController@getData');
    Route::post('/renstra-kegiatan/create', 'RenstraKegiatanController@create');
    Route::post('/renstra-kegiatan/update', 'RenstraKegiatanController@update');
    Route::post('/renstra-kegiatan/delete', 'RenstraKegiatanController@delete');

    Route::get('/renstra-sub-kegiatan/{kode}', 'RenstraSubKegiatanController@index');
    Route::post('/renstra-sub-kegiatan/get-data', 'RenstraSubKegiatanController@getData');
    Route::post('/renstra-sub-kegiatan/create', 'RenstraSubKegiatanController@create');
    Route::post('/renstra-sub-kegiatan/update', 'RenstraSubKegiatanController@update');
    Route::post('/renstra-sub-kegiatan/delete', 'RenstraSubKegiatanController@delete');

    Route::get('/perjanjian-kinerja-program', 'PerjanjianKinerjaController@index');
    Route::post('/perjanjian-kinerja-program/get-data', 'PerjanjianKinerjaController@getData');
    Route::post('/perjanjian-kinerja-program/create', 'PerjanjianKinerjaController@create');
    Route::post('/perjanjian-kinerja-program/update', 'PerjanjianKinerjaController@update');
    Route::post('/perjanjian-kinerja-program/delete', 'PerjanjianKinerjaController@delete');

    Route::get('/perjanjian-kinerja-program-indikator/{kode}', 'PerjanjianKinerjaIndikatorController@index');
    Route::post('/perjanjian-kinerja-program-indikator/get-data', 'PerjanjianKinerjaIndikatorController@getData');
    Route::post('/perjanjian-kinerja-program-indikator/create', 'PerjanjianKinerjaIndikatorController@create');
    Route::post('/perjanjian-kinerja-program-indikator/update', 'PerjanjianKinerjaIndikatorController@update');
    Route::post('/perjanjian-kinerja-program-indikator/delete', 'PerjanjianKinerjaIndikatorController@delete');

    Route::get('/rkpd-tetap-program', 'RkpdTetapController@index');
    Route::post('/rkpd-tetap-program/get-data', 'RkpdTetapController@getData');
    Route::post('/rkpd-tetap-program/create', 'RkpdTetapController@create');
    Route::post('/rkpd-tetap-program/update', 'RkpdTetapController@update');
    Route::post('/rkpd-tetap-program/delete', 'RkpdTetapController@delete');
    
    Route::get('/rkpd-penetapan-kegiatan/{kode}', 'RkpdTetapKegiatanController@index');
    Route::post('/rkpd-penetapan-kegiatan/get-data', 'RkpdTetapKegiatanController@getData');
    Route::post('/rkpd-penetapan-kegiatan/create', 'RkpdTetapKegiatanController@create');
    Route::post('/rkpd-penetapan-kegiatan/update', 'RkpdTetapKegiatanController@update');
    Route::post('/rkpd-penetapan-kegiatan/delete', 'RkpdTetapKegiatanController@delete');

    Route::get('/rkpd-penetapan-triwulan/{kode}', 'RkpdTetapTriwulanController@index');
    Route::post('/rkpd-penetapan-triwulan/get-data', 'RkpdTetapTriwulanController@getData');
    Route::post('/rkpd-penetapan-triwulan/create', 'RkpdTetapTriwulanController@create');
    Route::post('/rkpd-penetapan-triwulan/update', 'RkpdTetapTriwulanController@update');
    Route::post('/rkpd-penetapan-triwulan/delete', 'RkpdTetapTriwulanController@delete');

    Route::get('/rkpd-penetapan-sub-kegiatan/{kode}', 'RkpdTetapSubKegiatanController@index');
    Route::post('/rkpd-penetapan-sub-kegiatan/get-data', 'RkpdTetapSubKegiatanController@getData');
    Route::post('/rkpd-penetapan-sub-kegiatan/create', 'RkpdTetapSubKegiatanController@create');
    Route::post('/rkpd-penetapan-sub-kegiatan/update', 'RkpdTetapSubKegiatanController@update');
    Route::post('/rkpd-penetapan-sub-kegiatan/delete', 'RkpdTetapSubKegiatanController@delete');

    Route::get('/rkpd-ubah-program', 'RkpdUbahController@index');
    Route::post('/rkpd-ubah-program/get-data', 'RkpdUbahController@getData');
    Route::post('/rkpd-ubah-program/create', 'RkpdUbahController@create');
    Route::post('/rkpd-ubah-program/update', 'RkpdUbahController@update');
    Route::post('/rkpd-ubah-program/delete', 'RkpdUbahController@delete');

    Route::get('/rkpd-perubahan-kegiatan/{kode}', 'RkpdUbahKegiatanController@index');
    Route::post('/rkpd-perubahan-kegiatan/get-data', 'RkpdUbahKegiatanController@getData');
    Route::post('/rkpd-perubahan-kegiatan/create', 'RkpdUbahKegiatanController@create');
    Route::post('/rkpd-perubahan-kegiatan/update', 'RkpdUbahKegiatanController@update');
    Route::post('/rkpd-perubahan-kegiatan/delete', 'RkpdUbahKegiatanController@delete');

    Route::get('/rkpd-perubahan-sub-kegiatan/{kode}', 'RkpdUbahSubKegiatanController@index');
    Route::post('/rkpd-perubahan-sub-kegiatan/get-data', 'RkpdUbahSubKegiatanController@getData');
    Route::post('/rkpd-perubahan-sub-kegiatan/create', 'RkpdUbahSubKegiatanController@create');
    Route::post('/rkpd-perubahan-sub-kegiatan/update', 'RkpdUbahSubKegiatanController@update');
    Route::post('/rkpd-perubahan-sub-kegiatan/delete', 'RkpdUbahSubKegiatanController@delete');

    
    Route::get('/lra-program', 'LraProgramController@index');
    Route::post('/lra-program/get-data', 'LraProgramController@getData');
    // Route::post('/lra-program/create', 'LraProgramController@create');
    // Route::post('/lra-program/update', 'LraProgramController@update');
    // Route::post('/lra-program/delete', 'LraProgramController@delete');

    
    Route::get('/lra-kegiatan/{kode}', 'LraKegiatanController@index');
    Route::post('/lra-kegiatan/get-data', 'LraKegiatanController@getData');
    
    Route::get('/lra-sub-kegiatan/{kode}', 'LraSubKegiatanController@index');
    Route::post('/lra-sub-kegiatan/get-data', 'LraSubKegiatanController@getData');
    
    Route::get('/lra-triwulan/{kode}', 'LraTriwulanController@index');
    Route::post('/lra-triwulan/get-data', 'LraTriwulanController@getData');
    Route::post('/lra-triwulan/create', 'LraTriwulanController@create');
    Route::post('/lra-triwulan/update', 'LraTriwulanController@update');
    Route::post('/lra-triwulan/delete', 'LraTriwulanController@delete');
    
    Route::get('/lra-kegiatan-triwulan/{kode}', 'LraKegiatanTriwulanController@index');
    Route::post('/lra-kegiatan-triwulan/get-data', 'LraKegiatanTriwulanController@getData');
    Route::post('/lra-kegiatan-triwulan/create', 'LraKegiatanTriwulanController@create');
    Route::post('/lra-kegiatan-triwulan/update', 'LraKegiatanTriwulanController@update');
    Route::post('/lra-kegiatan-triwulan/delete', 'LraKegiatanTriwulanController@delete');

    Route::post('/set-data/opd', 'AdminController@setSessionOpd');
    Route::post('/set-data/rpjmd', 'AdminController@setSessionRpjmd');
    Route::post('/set-data/tahun', 'AdminController@setSessionTahun');

    Route::post('/get-data/rkpd-program', 'DataController@getDataRkpdProgram');

    Route::get('/laporan', 'LaporanController@index');


    
    Route::get('/laporan/renstra', 'LaporanRenstraController@index');
    
    Route::get('/laporan/iku', 'LaporanIKUController@index');
    
    Route::get('/laporan/perjanjian-kinerja', 'LaporanPerjanjianKinerjaController@index');
    
    Route::get('/laporan/renja', 'LaporanRenjaController@index');
    
    Route::get('/laporan/anggaran', 'LaporanAnggaranController@index');

});


Route::post('/laporan/renstra', 'LaporanRenstraController@loadLaporan');
Route::post('/laporan/iku', 'LaporanIKUController@loadLaporan');
Route::post('/laporan/perjanjian-kinerja', 'LaporanPerjanjianKinerjaController@loadLaporan');
Route::post('/laporan/renja', 'LaporanRenjaController@loadLaporan');
Route::post('/laporan/anggaran', 'LaporanAnggaranController@loadLaporan');

Route::post('/laporan', 'LaporanController@loadLaporan');


Route::get('/masuk', 'PublicController@login');
Route::post('/masuk', 'PublicController@cekLogin');

Route::get('/keluar', 'PublicController@logout');


Route::get('/', 'PublicController@beranda');

Route::get('/laporan-pdf','AdminController@generatePDF');


Route::get('/lfi', 'PublicController@lfi');
