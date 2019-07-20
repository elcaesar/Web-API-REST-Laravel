<?php

use App\Asignatura;
use App\Docente;

// ------ LOGIN ------------

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', function() {
	return view('auth.login');
});


Route::post('/login', 'Auth\loginController@login')->name('login');

// Asignaturas
Route::resource('asignaturas', 'AsignaturasController');
Route::get('asignaturas', 'AsignaturasController@index')->name('asignaturas.list');  
//Route::post('asignaturas/show', 'AsignaturasController@show')->name('asignaturas.show');
Route::get('asignaturas/{id}/verdocentes', 'AsignaturasController@verdocentes')->name('asignaturas.verdocentes');
Route::get('asignaturas/plan/{plan}', 'AsignaturasController@verplan')->name('asignaturas.verplan');
Route::get('asignaturas/vercursadas/{id}', 'AsignaturasController@vercursadas')->name('asignaturas.vercursadas');
Route::get('asignaturas/detallecursadas/{idasig}/{plan}', 'AsignaturasController@detallecursadas')->name('asignaturas.detallecursadas');


//----------------------------------------------------

//Docentes
Route::resource('docentes', 'DocentesController');
Route::get('docentes', 'DocentesController@index')->name('docentes.list');
Route::get('docentes/{id}/verasignaturas', 'DocentesController@verasignaturas')->name('docentes.verasignaturas');

//----------------------------------------------------
Route::resource('alumnos', 'AlumnosController');
Route::resource('cursadas', 'CursadasController');
Route::resource('examenes', 'ExamenesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
