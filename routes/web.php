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
Route::get('users', 'UsersController@index');
# Route untuk tambah user
Route::get('users/add', 'UsersController@create');
# Route untuk terima data dari borang tambah user
Route::post('users/add', 'UsersController@store');
# Route untuk edit user
Route::get('users/{id}/edit', 'UsersController@edit');

# Route senarai aduan
Route::get('aduan', 'AduanController@index');
# Route untuk tambah aduan
Route::get('aduan/add', 'AduanController@create');
# Route untuk terima data dari borang tambah aduan
Route::post('aduan/add', 'AduanController@store');
# Route untuk edit aduan
Route::get('aduan/{id}/edit', 'AduanController@edit');
