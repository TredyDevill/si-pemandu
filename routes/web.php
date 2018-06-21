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
    Route::get('/', 'AdminController@index')->middleware('auth:admin')->name('admin.dashboard');
    Route::get('/maps', 'MapsAdminController@index');
    // Route::get('/laporanbayi', 'LaporanBayiAdminController@index');
    Route::resource('/laporanbayi', 'LaporanBayiAdminController');
    // Route::get('/laporanbalita', 'LaporanBalitaAdminController@index');
    Route::resource('laporanbalita', 'LaporanBalitaAdminController');
    Route::get('/pendaftaran', 'DaftarAdminController@index');
    Route::resource('petugas', 'AdmPetugasController');
    Route::get('/datasasaran', 'SasaranAdminController@index');
    Route::get('/datakms', 'KmsAdminController@index');
    Route::get('/datakbbl', 'KbblAdminController@index');
    Route::get('/dataimunisasi', 'ImuniAdminController@index');
    Route::get('/datavitamin', 'VitAdminController@index');
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
Route::post('/kmeans-post', 'HomeController@postjsphp');
Route::get('/kmeansbalita', 'HomeController@jsphpbalita');
Route::post('/kmeansbalita-post', 'HomeController@postjsphpbalita');