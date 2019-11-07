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

Route::post('/evento/novo', 'ControllerEvento@store');
Route::delete('/evento/{id}', 'ControllerEvento@destroy');
Route::get('/evento/{id}', 'ControllerEvento@show');
Route::put('evento/{id}', 'ControllerEvento@edit');


Route::get('/evento/cracha/{idEvento}/{idParticipante}','ControllerEvento@cracha');
Route::post('/evento/adicionar/{id}/', 'ControllerEvento@adicionar');

Route::get('/evento/participantes/{idEvento}', 'ControllerEvento@indexParticipante');
Route::delete('/evento/remover/{idEvento}/{idparticipante}', 'ControllerEvento@removerParticipante');


Route::get('qr-code-g', function () {
    \QrCode::size(800)
              ->format('png')
              ->generate('Eventos', public_path('images/qrcode.png'));
      
    return view('qrCode');
      
});
Route::get('/evento/pdf/{idEvento}', 'ControllerEvento@pdfview');

