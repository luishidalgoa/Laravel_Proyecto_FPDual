<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfessorController;


Route::apiResource('companys', CompanyController::class);
Route::apiResource('professors', ProfessorController::class);

