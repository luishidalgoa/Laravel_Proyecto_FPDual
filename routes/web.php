<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/companys', [CompanyController::class, 'index'])->name('companys.empresa');
Route::get('/professors', [EmpresaController::class, 'index'])->name('professors.profesor');

