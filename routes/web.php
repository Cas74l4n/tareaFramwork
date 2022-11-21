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
	Route::view('htrabajos', 'livewire.htrabajos.index')->middleware('auth');
	Route::view('asistencias', 'livewire.asistencias.index')->middleware('auth');
	Route::view('clases', 'livewire.clases.index')->middleware('auth');
	Route::view('hclases', 'livewire.hclases.index')->middleware('auth');
	Route::view('alumnos', 'livewire.alumnos.index')->middleware('auth');
	Route::view('horarioTrabajos', 'livewire.horarioTrabajos.index')->middleware('auth');
	Route::view('maestros', 'livewire.maestros.index')->middleware('auth');
	Route::view('disiplinas', 'livewire.disiplinas.index')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
