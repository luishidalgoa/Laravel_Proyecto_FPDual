<?php

use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas.empresa');
Route::get('/profesores', [EmpresaController::class, 'index'])->name('profesores.profesor');

