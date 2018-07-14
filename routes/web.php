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

Route::get('/', 'petugasController@index');
Route::get('/login', 'petugasController@login');
Route::get('/register', 'petugasController@register');
Route::post('/registerPost', 'petugasController@registerPost');
Route::post('/loginPost', 'petugasController@loginPost');
Route::get('/logout', 'petugasController@logout');
Route::get('/databuku', 'bukuController@databuku');
Route::post('/tambahbuku', 'bukuController@tambahbuku');
Route::get('/{id}/editbuku', 'bukuController@editbuku');
Route::put('/{id}/updatebuku', 'bukuController@update');
Route::delete('/{id}/deletebuku', 'bukuController@delete');
Route::get('/datamahasiswa', 'mahasiswaController@datamahasiswa');
Route::post('/tambahmahasiswa', 'mahasiswaController@tambahmahasiswa');
Route::get('/{id}/editmahasiswa', 'mahasiswaController@edit');
Route::put('/{id}/updatemahasiswa', 'mahasiswaController@update');
Route::delete('/{id}/deletemahasiswa', 'mahasiswaController@delete');
Route::get('/datapetugas', 'petugasController@show');
Route::post('/tambahpetugas', 'petugasController@tambah');
Route::get('/{id}/editpetugas', 'petugasController@edit');
Route::put('/{id}/updatepetugas', 'petugasController@update');
Route::delete('/{id}/deletepetugas', 'petugasController@delete');
Route::get('/datapeminjam', 'peminjamController@index');
Route::post('/tambahpeminjam', 'peminjamController@create');
Route::get('/{id}/editpeminjam', 'peminjamController@edit');
Route::put('/{id}/updatepeminjam', 'peminjamController@update');
Route::delete('/{id}/deletepeminjam', 'peminjamController@delete');
Route::get('/{id}/statuspeminjam', 'peminjamController@status');
Route::get('/datapengembalian', 'pengembalianController@index');
Route::get('/{id}/balikbuku', 'pengembalianController@insert');
Route::delete('/{id}/deletepengembali', 'pengembalianController@destroy');
