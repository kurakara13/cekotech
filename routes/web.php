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

Route::middleware('auth')->group(function(){
	Route::get('/wajib-pajak/impor-excel', 'PembayaranPajakController@imporExcel')->name('wp.impor-excel');
	Route::post('/wajib-pajak/impor-excel', 'PembayaranPajakController@postExcel')->name('wajib-pajak.impor-excel');
	Route::get('/wajib-pajak/{wajib_pajak}/normal', 'PembayaranPajakController@normal')->name('wajib-pajak.normal');
	Route::get('/wajib-pajak/{wajib_pajak}/non-efektif', 'PembayaranPajakController@nonEfektif')->name('wajib-pajak.non-efektif');
	Route::resource('wajib-pajak', 'PembayaranPajakController');
	Route::get('/akun/impor-excel', 'AkunController@imporExcel')->name('impor-excel');
	Route::post('/akun/impor-excel', 'AkunController@postExcel')->name('akun.impor-excel');
	Route::resource('akun', 'AkunController');
	Route::get('/profil-saya','ProfileController@index')->name('profile');
	Route::put('/profil-saya','ProfileController@update')->name('profile.update');
	Route::get('/keluar','KeluarController@keluar');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('dasbor');
