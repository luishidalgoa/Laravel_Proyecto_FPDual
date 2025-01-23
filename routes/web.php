<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfessorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/companys', [CompanyController::class, 'index'])->name('company.company');
Route::get('/professors', [ProfessorController::class, 'index'])->name('professor.professor');

