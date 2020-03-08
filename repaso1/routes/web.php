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
    return view('index');
});

Route::get('install/model/{nombre}', 'InstallController@model');
Route::get('install/migrate', 'InstallController@migrate');
Route::get('install/migration/{nombre}', 'InstallController@migration');
Route::get('install/request/{nombre}', 'InstallController@request');
Route::resource('clientes', 'ClienteController');
Route::resource('alojamientos', 'AlojamientoController');
