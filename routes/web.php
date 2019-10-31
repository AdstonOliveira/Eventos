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

Route::get('/evento/index','ControllerEvento@index');
Route::delete('/evento/delete/{id}', 'ControllerEvento@destroy');
Route::post('/evento/novo', 'ControllerEvento@create');
