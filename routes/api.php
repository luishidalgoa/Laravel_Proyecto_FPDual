<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompanyApiController;
use App\Http\Controllers\API\ProfessorApiController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\NoteApiController; // Importa el controlador de notas

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Para logout se requiere que la petición esté autenticada
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->get('/professor', function (Request $request) {
    return $request->user(); // Devuelve los datos del profesor autenticado
});

// Rutas de los recursos de Company, Professor y Note
Route::apiResource('companies', CompanyApiController::class);
Route::apiResource('professors', ProfessorApiController::class);
Route::apiResource('notes', NoteApiController::class); // Agrega las rutas para NoteApiController