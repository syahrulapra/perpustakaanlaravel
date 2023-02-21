<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'LoginController@login')->name('login');

Route::post('/loginaksi', 'LoginController@loginaksi')->name('loginaksi');

Route::get('/logoutaksi', 'LoginController@logoutaksi')->name('logoutaksi');

Route::get('/dashboard', function () {
    return view('page/dashboard');
})->name('home');

Route::get('/buku', 'BukuController@index')->name('buku');

Route::get('/cari','BukuController@cari');

Route::post('/buku/tambah','BukuController@tambah');

Route::put('/buku/edit/{idbuku}','BukuController@edit');

Route::get('/buku/hapus/{idbuku}','BukuController@hapus');

Route::get('/siswa', 'SiswaController@index')->name('siswa');

Route::get('/siswa/cari','SiswaController@cari');

Route::post('/siswa/tambah','SiswaController@tambah');

Route::put('/siswa/edit/{idsiswa}','SiswaController@edit');

Route::get('/siswa/hapus/{idsiswa}','SiswaController@hapus');

Route::get('/signup',  function () {
    return view('signup');
});

Route::get('/petugas', 'PetugasController@index')->name('petugas');

Route::get('/petugas/cari', 'PetugasController@cari');

Route::post('/petugas/tambah','PetugasController@tambah');

Route::put('/petugas/edit/{idpetugas}', 'PetugasController@edit')->name('edit');

Route::get('/petugas/hapus/{idpetugas}', 'PetugasController@hapus');

Route::get('/pinjam', 'PinjamController@index')->name('pinjam');

Route::post('/pinjam/tambah', 'PinjamController@tambah');

Route::get('/pinjam/hapus/{idpinjam}', 'PinjamController@hapus');