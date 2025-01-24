<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfessorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('companys', CompanyController::class);
Route::get('/professors', [ProfessorController::class, 'index'])->name('professors.index');
Route::get('/professors/create', [ProfessorController::class, 'create'])->name('professors.create');
Route::post('/professors/store', [ProfessorController::class, 'store'])->name('professors.store');
Route::get('/professors/{id}', [ProfessorController::class, 'show'])->name('professors.show');
Route::get('/professors/edit/{id}', [ProfessorController::class, 'edit'])->name('professors.edit');
Route::put('/professors/update/{id}', [ProfessorController::class, 'update'])->name('professors.update');
Route::delete('/professors/destroy/{id}', [ProfessorController::class, 'destroy'])->name('professors.destroy');