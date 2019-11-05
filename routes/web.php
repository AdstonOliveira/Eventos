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
    return view('template');
});

//participante
Route::resource('participante', 'ParticipanteController');
// Route::get('participante/index','ControlleParticipante@index');

// Route::get('participante/create', 'ControllerParticipante@create');
// Route::delete('participante/delete/{id}', 'ControllerParticipante@destroy');
// Route::post('participante/novo', 'ControllerParticipante@create');
// Route::get('participante/{id}', 'ControllerParticipante@show');
// Route::delete('participante/delete/{id}', 'ControllerParticipante@destroy');



//Evento
Route::get('/evento','ControllerEvento@index');

Route::get('/evento/novo', 'ControllerEvento@create');

Route::delete('/evento/{id}', 'ControllerEvento@destroy');
Route::post('/evento/novo', 'ControllerEvento@store');
Route::get('/evento/{id}', 'ControllerEvento@show');
