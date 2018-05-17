<?php
# Homepage route
Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/home', '/dashboard');

# Authentication routes
Auth::routes();

# Protection middleware authenticate
Route::group(['middleware' => 'auth'], function() {

  # Route dashboard user
  Route::get('dashboard', 'PagesController@dashboard');

  # Route senarai users
  Route::get('users', 'UsersController@index')->name('users.index');
  # Route untuk paparkan borang tambah user
  Route::get('users/add', 'UsersController@create')->name('users.create');
  # Route untuk terima data dari borang tambah user dan simpan rekod user ke table users
  Route::post('users/add', 'UsersController@store')->name('users.store');
  # Route untuk paparkan aduan user
  Route::get('users/{id}/aduan', 'UsersController@aduan')->name('users.aduan');
  # Route untuk paparkan borang edit user
  Route::get('users/{id}/edit', 'UsersController@edit')->name('users.edit');
  # Route untuk terima data dari borang edit user dan update ke dalam table users
  Route::patch('users/{id}/edit', 'UsersController@update')->name('users.update');
  # Route untuk delete user berdasarkan ID
  Route::delete('users/{id}', 'UsersController@destroy')->name('users.destroy');

  # Route senarai modul
  Route::get('modul', 'ModulController@index')->name('modul.index');
  # Route untuk paparkan borang tambah modul
  Route::get('modul/add', 'ModulController@create')->name('modul.create');
  # Route untuk terima data dari borang tambah modul dan simpan rekod modul ke table modul
  Route::post('modul/add', 'ModulController@store')->name('modul.store');
  # Route untuk paparkan rekod aduan bagi setiap modul
  Route::get('modul/{id}/aduan', 'ModulController@aduan')->name('modul.aduan');
  # Route untuk paparkan borang edit modul
  Route::get('modul/{id}/edit', 'ModulController@edit')->name('modul.edit');
  # Route untuk terima data dari borang edit modul dan update ke dalam table modul
  Route::patch('modul/{id}/edit', 'ModulController@update')->name('modul.update');
  # Route untuk delete modul berdasarkan ID
  Route::delete('modul/{id}', 'ModulController@destroy')->name('modul.destroy');

  # Route senarai aduan
  Route::get('aduan', 'AduanController@index')->name('aduan.index');
  # Route untuk papar borang tambah aduan
  Route::get('aduan/add', 'AduanController@create')->name('aduan.create');
  # Route untuk terima data dari borang tambah aduan
  Route::post('aduan/add', 'AduanController@store')->name('aduan.store');
  # Route untuk papar borang edit aduan
  Route::get('aduan/{id}/edit', 'AduanController@edit')->name('aduan.edit');
  # Route untuk simpan kemaskini rekod aduan
  Route::patch('aduan/{id}/edit', 'AduanController@update')->name('aduan.update');
  # Route untuk delete rekod aduan
  Route::delete('aduan/{id}', 'AduanController@destroy')->name('aduan.destroy');

});
