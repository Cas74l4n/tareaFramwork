<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('maestros', 'livewire.maestros.index')->middleware('auth');
	Route::view('horario_trabajos', 'livewire.horario_trabajos.index')->middleware('auth');
	Route::view('horario_clases', 'livewire.horario_clases.index')->middleware('auth');
	Route::view('clases', 'livewire.clases.index')->middleware('auth');
	Route::view('asistencias', 'livewire.asistencias.index')->middleware('auth');
	Route::view('maestro', 'livewire.maestro.index')->middleware('auth');
	Route::view('horario_trabajo', 'livewire.horario_trabajo.index')->middleware('auth');
	Route::view('horario_clase', 'livewire.horario_clase.index')->middleware('auth');
	Route::view('disiplinas', 'livewire.disiplinas.index')->middleware('auth');
	Route::view('clase', 'livewire.clase.index')->middleware('auth');
	Route::view('asistencia', 'livewire.asistencia.index')->middleware('auth');
	Route::view('alumnos', 'livewire.alumnos.index')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
