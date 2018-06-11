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
Route::get('/home', 'HomeController@index')->middleware('auth')->name('grafik');
  Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/maps', 'MapsAdminController@index');
    Route::get('/laporanbayi', 'LaporanBayiAdminController@index');
    Route::get('/laporanbalita', 'LaporanBalitaAdminController@index');
    Route::get('/pendaftaran', 'DaftarAdminController@index');
    Route::resource('petugas', 'AdmPetugasController');
  });

Route::get('/maps', 'MapsController@index');
// Route::get('/petugas', 'PetugasController@index');
Route::resource('petugas', 'PetugasController');
Route::get('/laporanbayi', 'LapBayiController@index');
Route::get('/laporanbalita', 'LapBalitaController@index');
Route::get('/pendaftaran', 'DaftarController@index');
// Route::get('/datakms', 'KmsController@index');
Route::resource('/datakms', 'KmsController');
// Route::get('/datakbbl', 'KbblController@index');
Route::resource('datakbbl', 'KbblController');
// Route::get('/datasasaran', 'DatasasaranController@index');
Route::resource('datasasaran', 'DatasasaranController');
Route::get('/datagizi', 'GiziController@index');
// Route::get('/dataimunisasi', 'ImunisasiController@index');
Route::resource('/dataimunisasi', 'ImunisasiController');
// Route::get('/datavitamina', 'VitaminController@index');
Route::resource('/datavitamina', 'VitaminController');
Route::get('/datakesehatananak', 'KesehatanController@index');
Route::get('/kmeans', 'HomeController@jsphp');
