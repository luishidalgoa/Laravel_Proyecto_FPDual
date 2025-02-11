<?php

use App\Http\Controllers\API\CompanyApi;
use App\Http\Controllers\API\PorfessorApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('companys', CompanyApi::class);
Route::apiResource('professors', PorfessorApi::class);

