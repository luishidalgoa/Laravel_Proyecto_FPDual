<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\ProfessorController;


Route::apiResource('companys', CompanyController::class);
Route::apiResource('professors', ProfessorController::class);

