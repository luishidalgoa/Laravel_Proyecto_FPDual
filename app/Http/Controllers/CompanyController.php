<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // Mostrar todas las compañías
    public function index()
    {
        $companys = Company::all(); // O usar paginación ->paginate(10)
        return view('companys.index', compact('companys'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        return view('companys.create');
    }

    // Guardar una nueva compañía
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'date_creation' => 'nullable|date',
        ]);

        Company::create($validated);

        return redirect()->route('companys.index')->with('success', 'Company created successfully.');
    }

    // Mostrar detalles de una compañía
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('companys.show', compact('company'));
    }

    // Mostrar el formulario de edición
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companys.edit', compact('company'));
    }

    // Actualizar una compañía
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'date_creation' => 'nullable|date',
        ]);

        $company = Company::findOrFail($id);
        $company->update($validated);

        return redirect()->route('companys.index')->with('success', 'Company updated successfully.');
    }

    // Eliminar una compañía
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('companys.index')->with('success', 'Company deleted successfully.');
    }
}
