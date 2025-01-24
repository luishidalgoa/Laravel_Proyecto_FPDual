<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;


class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professors = Professor::all();
        return view('professors.index', compact('professors'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('professors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'fullname' => 'required|string|max:100',
            'age' => 'required|integer|min:18|max:100',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:150',
            'telephone' => 'required|string|max:9',
            'email' => 'required|email|unique:professors,email|max:50',
        ]);

        Professor::create($validate);

        return redirect()->route('professors.index')
            ->with('success', 'Professor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $professor = Professor::find($id);

        if (!$professor) {
            // Si no se encuentra el profesor, redirige o muestra un error
            return redirect()->route('professors.index')->with('error', 'Profesor no encontrado.');
        }
        return view('professors.show', compact('professor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $professor = Professor::findOrFail($id);
        return view('professors.edit', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:100',
            'age' => 'required|integer|min:18|max:100',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:150',
            'telephone' => 'required|string|max:9',
            'email' => 'required|email|unique:professors,email,' . $id . '|max:50', // Excluir el email actual
        ]);

        // Buscar el profesor
        $professor = Professor::find($id);

        if (!$professor) {
            return redirect()->route('professors.index')->with('error', 'Profesor no encontrado.');
        }

        // Actualizar el profesor con los datos validados
        $professor->update($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('professors.index')
            ->with('success', 'Profesor actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Professor::destroy($id);
        return redirect()->route('professors.index')
            ->with('success', 'Professor deleted successfully.');
    }
}
