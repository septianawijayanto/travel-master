<?php

use App\Http\Controllers\SupirController;
use Illuminate\Support\Facades\Route;

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
//Route Fronend
Route::get('/', 'SiteController@home');
Route::get('/about', 'SiteController@about');
Route::get('/kontak', 'SiteController@kontak');


//Autentikasi Login
Route::get('/login', 'AuthController@login')->name('login')->middleware('guest');
Route::post('/postlogin', 'AuthController@postlogin')->middleware('guest');
//Autentikasi Registrasi
Route::get('/registrasi', 'AuthController@registrasi')->name('registrasi')->middleware('guest');
Route::post('/postregistrasi', 'AuthController@postregistrasi')->middleware('guest');
//Autentikasi Logout
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {

    //Route supir
    Route::get('/supir', 'SupirController@index');
    Route::post('/supir/create', 'SupirController@create');

    Route::get('/supir/{id}/edit', 'SupirController@edit');
    Route::post('/supir/{id}/update', 'SupirController@update');

    Route::get('/supir/{id}/delete', 'SupirController@delete');
    Route::get('/supir/{id}/detail', 'SupirController@detail');

    Route::get('supir/export', 'SupirController@export');

    //Route Jadwal
    Route::post('/jadwal/create', 'JadwalController@create');
    Route::get('/jadwal', 'JadwalController@index');
    Route::get('/jadwal/{id}/delete', 'JadwalController@delete');

    Route::get('/jadwal/{id}/edit', 'JadwalController@edit');
    Route::post('/jadwal/{id}/update', 'JadwalController@update');

    Route::get('/jadwal/export', 'JadwalController@export');

    //Mobil
    Route::post('/mobil/create', 'MobilController@create');
    Route::get('/mobil', 'MobilController@index');
    Route::get('/mobil/{id}/delete', 'MobilController@delete');

    Route::get('/mobil/{id}/edit', 'MobilController@edit');
    Route::post('/mobil/{id}/update', 'MobilController@update');

    Route::get('/mobil/export', 'MobilController@export');

    //Route pemesan Admin
    //Route::post('/pemesan/create', 'PemesanController@create');
    Route::get('/datapemesan', 'PemesanController@tblpemesan');
    //filter
    Route::get('/datapemesan/periode', 'PemesanController@periode');
    Route::get('/datapemesan/tujuan', 'PemesanController@tujuan');

    Route::get('/datapemesan/{id}/edit', 'PemesanController@edit');
    Route::post('/datapemesan/{id}/update', 'PemesanController@update');

    Route::get('/datapemesan/{id}/delete', 'PemesanController@delete');
    Route::get('/datapemesan/{id}/detail', 'PemesanController@detail');

    Route::get('/datapemesan/verifikasi/{id}', 'PemesanController@verifikasi');

    Route::get('/pemesanan/export', 'PemesanController@export');
});
Route::group(['middleware' => ['auth', 'checkRole:admin,supir,pemesan']], function () {
    //Beranda
    Route::get('/beranda', 'BerandaController@index');
    Route::get('/profil', 'ProfilController@index');
    //pemesanan

});
Route::group(['middleware' => ['auth', 'checkRole:pemesan']], function () {
    Route::get('/pemesanan', 'PemesananController@index');
    Route::post('/pemesanan/{user_id}', 'PemesananController@create');
    Route::put('/pemesanan/{user_id}', 'PemesananController@update');
    Route::get('/pemesanan/{user_id}/data', 'PemesananController@data');
    //Route::get('/pemesanan/{id}/profil', 'PemesanController@profil');

    // verifikasi pembayaran
    Route::get('verifikasi/{user_id}', 'VerifikasiController@index');
    Route::post('verifikasi/{user_id}', 'VerifikasiController@verifikasi');

    //Cetak Tiket
    Route::get('/cetak-tiket', 'PemesananController@cetak');
});
Route::group(['middleware' => ['auth', 'checkRole:supir']], function () {
    Route::get('/profilsupir/{user_id}', 'SupirController@jadwal');
});
