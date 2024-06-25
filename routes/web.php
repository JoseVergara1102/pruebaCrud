<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecursoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('recursos', RecursoController::class);
    Route::resource('personas', PersonaController::class);
    Route::resource('proyectos', ProyectoController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});
