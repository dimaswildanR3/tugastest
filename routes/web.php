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


Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

//Route untuk user Admin
Route::group(['middleware' => ['auth', 'checkRole:admin,user']], function () {
    Route::get('/jenis_sampah/index','JenisSampahController@index')->name('jenis_sampah'); // Show all users
    Route::post('/jenis_sampah/store', 'JenisSampahController@store'); // Create a new user
    Route::get('/jenis_sampah/create', 'JenisSampahController@create'); // Show the form to create a new user
    Route::get('/jenis_sampah/{id}', 'JenisSampahController@show'); // Show a specific user
    Route::put('/jenis_sampah/{id}', 'JenisSampahController@update'); // Update a specific user
    Route::get('/jenis_sampah/{id}/destroy', 'JenisSampahController@destroy'); // Delete a specific user
    Route::get('/jenis_sampah/{id}/edit', 'JenisSampahController@edit'); // Show the form to edit a specific user
    
    Route::get('/jumlah_sampah/index', 'JumlahSampahController@index')->name('jumlah_sampah'); // Show all users
    Route::post('/jumlah_sampah/store', 'JumlahSampahController@store'); // Create a new user
    Route::get('/jumlah_sampah/create', 'JumlahSampahController@create'); // Show the form to create a new user
    // Route::get('/jumlah_sampah/{id}', 'JumlahSampahController@show'); // Show a specific user
    Route::post('/jumlah_sampah/{id}/update', 'JumlahSampahController@update'); // Update a specific user
    Route::get('/jumlah_sampah/{id}/destroy', 'JumlahSampahController@destroy'); // Delete a specific user
    Route::get('/jumlah_sampah/{id}/edit', 'JumlahSampahController@edit'); // Show the form to edit a specific user
    
    Route::get('/total_sampah/index', 'TotalSampahController@index')->name('total_sampah'); // Show all users
    Route::post('/total_sampah/store', 'TotalSampahController@store'); // Create a new user
    Route::get('/total_sampah/create', 'TotalSampahController@create'); // Show the form to create a new user
    Route::get('/total_sampah/{id}/show', 'TotalSampahController@show'); // Show a specific user
    Route::put('/total_sampah/{id}/update', 'TotalSampahController@update'); // Update a specific user
    Route::get('/total_sampah/{id}/destroy', 'TotalSampahController@destroy'); // Delete a specific user
    Route::get('/total_sampah/{id}/edit', 'TotalSampahController@edit');
  
 

    Route::resource('/instansi', 'InstansiController');
    Route::resource('/pengguna', 'PenggunaController');

    Route::get('/', function () {
        return view('/dashboard');
    });
    

    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/dashboardd', 'DashboardController@indexx');

    Route::get('/pengumuman/index', 'PengumumanController@index');
    Route::post('/pengumuman/tambah', 'PengumumanController@tambah');
});

