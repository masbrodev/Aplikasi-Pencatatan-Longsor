<?php
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

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::resource('outlets', 'OutletController');
Route::get('/our_outlets', 'OutletMapController@index')->name('outlet_map.index');

Route::group(['prefix' => 'longsor', 'middleware' => 'auth'], function () {
    Route::get('/', 'DataLongsorController@index');
    Route::post('tambah', 'DataLongsorController@tambah');
    Route::post('edit/{id}', 'DataLongsorController@edit');
    Route::get('hapus/{id}', 'DataLongsorController@hapus');
});

Route::group(['prefix' => 'kerusakan', 'middleware' => 'auth'], function () {
    Route::get('/', 'KerusakanController@index');
    Route::post('tambah', 'KerusakanController@tambah');
    Route::post('edit/{id}', 'KerusakanController@edit');
    Route::get('hapus/{id}', 'KerusakanController@hapus');
});

Route::get('/', 'HomeController@index');
Route::get('/kecamatan', 'KecamatanController@index');
Route::get('/kerusakan', 'KerusakanController@index');
Route::get('/peta', 'PetaController@index');