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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('/maps', 'MapsController@index');
// Route::get('/petugas', 'PetugasController@index');
Route::resource('petugas', 'PetugasController');
Route::get('/laporanbayi', 'LapBayiController@index');
Route::get('/laporanbalita', 'LapBalitaController@index');
// Route::get('/tambahpetugas', 'TambahpetugasController@index');
