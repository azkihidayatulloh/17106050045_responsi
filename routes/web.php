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

Route::get('/buku', 'BukuController@indexByGuest')->name('buku');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/pinjam_buku', 'TransaksiController@create')->name('pinjam_buku');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});

Route::prefix('admin')->middleware('auth:admin')->group(function() {
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/kelola_penulis', 'PenulisController@index')->name('admin.kelola_penulis');
    Route::get('/tambah_penulis', 'PenulisController@showTambahPenulisForm')->name('admin.tambah_penulis');
    Route::post('/tambah_penulis', 'PenulisController@store')->name('admin.tambah_penulis.submit');
    Route::get('/kelola_buku', 'BukuController@index')->name('admin.kelola_buku');
    Route::get('/tambah_buku', 'BukuController@showTambahBukuForm')->name('admin.tambah_buku');
    Route::post('/tambah_buku', 'BukuController@store')->name('admin.tambah_buku.submit');
});

Route::prefix('user')->middleware('auth')->group(function() {
    Route::get('/history/{id}', 'TransaksiController@showByUserId')->name('user.history');
    Route::get('/lihat_buku', 'BukuController@indexByUser')->name('user.lihat_buku');
});
