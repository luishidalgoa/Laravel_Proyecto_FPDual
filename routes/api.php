<?php

use App\Http\Controllers\API\ProfessorApi;
use App\Http\Controllers\API\CompanyApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('companys', CompanyApi::class);
Route::apiResource('professors', ProfessorApi::class);

