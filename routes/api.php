<?php

use App\Http\Controllers\API\ProfessorController as APIProfessorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;


Route::apiResource('companys', CompanyController::class);
Route::apiResource('professors', APIProfessorController::class);

