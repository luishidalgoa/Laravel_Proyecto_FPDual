<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfessorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('companys', CompanyController::class);
Route::resource('professors', ProfessorController::class);