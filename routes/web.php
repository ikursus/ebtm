<?php
# Homepage route
Route::get('/', function () {
    return view('welcome');
});
# Authentication routes
Auth::routes();

# Route dashboard user
Route::get('dashboard', 'PagesController@dashboard');

# Route senarai users
Route::get('users', 'UsersController@index')->name('users.index');
# Route untuk paparkan borang tambah user
Route::get('users/add', 'UsersController@create')->name('users.create');
# Route untuk terima data dari borang tambah user dan simpan rekod user ke table users
Route::post('users/add', 'UsersController@store')->name('users.store');
# Route untuk paparkan borang edit user
Route::get('users/{id}/edit', 'UsersController@edit')->name('users.edit');
# Route untuk terima data dari borang edit user dan update ke dalam table users
Route::patch('users/{id}/kemaskini', 'UsersController@update')->name('users.update');

# Route senarai aduan
Route::get('aduan', 'AduanController@index');
# Route untuk tambah aduan
Route::get('aduan/add', 'AduanController@create');
# Route untuk terima data dari borang tambah aduan
Route::post('aduan/add', 'AduanController@store');
# Route untuk edit aduan
Route::get('aduan/{id}/edit', 'AduanController@edit');
