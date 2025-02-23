<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    // Mostrar todas las notas del usuario
    public function index()
    {
        $notes = Auth::user()->notes;
        return view('dashboard', compact('notes'));
    }

    // Guardar una nueva nota
    public function store(Request $request)
    {
        $request->validate([
            'notes' => 'required|string',
        ]);

        $user = Auth::user();

        Note::updateOrCreate(
            ['user_id' => $user->id],
            ['notes' => $request->notes]
        );

        return back()->with('status', 'Notas guardadas correctamente');
    }

    // Mostrar el formulario de edición de una nota
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    // Actualizar una nota existente
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'notes' => 'required|string',
        ]);

        $note->update(['notes' => $request->notes]);

        return redirect()->route('dashboard')->with('status', 'Nota actualizada correctamente');
    }

    // Eliminar una nota
    public function destroy(Note $note)
    {
        $note->delete();
        return back()->with('status', 'Nota eliminada correctamente');
    }
}