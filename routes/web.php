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

Auth::routes();


Route::get('/logout', [
    'uses' => 'HomeController@getLogout',
    'as' => 'getLogout'
]);

//Route::get('/home', 'HomeController@index');

Route::get('/admin', [
    'uses' => 'DirectoryController@index',
    'as' => 'directory.index',
    'middleware' => ['web', 'auth']
]);

Route::get('/directory/{id}', [
    'uses' => 'DirectoryController@show',
    'as' => 'directory.show',
    'middleware' => ['web', 'auth']
]);

Route::get('/directory-destroy/{id}', [
    'uses' => 'DirectoryController@destroy',
    'as' => 'directory.destroy',
    'middleware' => ['web', 'auth']
]);





Route::get('/', function () {
    return view('directories.directory-add-form');
});

Route::post('/directory-store', [
    'uses' => 'DirectoryController@store',
    'as' => 'directory.store'
]);
