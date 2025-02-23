<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Auth;

// Rutas públicas
Route::get('/', function () {
    return view('layouts.index');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/index', function () {
    return view('layouts.index');
})->name('layouts.index');

// Rutas de recursos (companys y professors)
Route::resource('companys', CompanyController::class);
Route::resource('professors', ProfessorController::class);

// Rutas protegidas por autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard con notas
    Route::get('/dashboard', function () {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si el usuario está autenticado
        if (!$user) {
            return redirect()->route('login');
        }

        // Obtener todas las notas del usuario
        $notes = $user->notes;

        // Pasar las notas y el profesor a la vista
        return view('dashboard', [
            'notes' => $notes, // Todas las notas del usuario
            'professor' => $user->professor,
        ]);
    })->name('dashboard');

    // Rutas para notas
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store'); // Guardar una nueva nota
    Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit'); // Mostrar formulario de edición
    Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update'); // Actualizar una nota existente
    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy'); // Eliminar una nota

    
});