<?php

// Define el espacio de nombres para el controlador CompanyController
namespace App\Http\Controllers;


use App\Models\Company;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    // Devuelve todas las empresas almacenadas
    public function list()
    {
        $enterprises = Company::all(); 
        return view('enterprises.list', ['enterprises' => $enterprises]);
    }

    // Muestra el formulario para añadir una nueva empresa
    public function new()
    {
        return view('enterprises.new');
    }

    /**
     * 
     * Aqui estamos validando los datos que se ingresan en el formulario de creación de una empresa.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        // Validación de los datos ingresados
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'sometimes|string|max:255',
            'telephone' => 'sometimes|string|max:20',
            'email' => 'sometimes|email|max:100',
            'date_creation' => 'sometimes|date',
            'professor_id' => 'sometimes|integer|exists:professors,id',
        ]);

        // Se almacena el registro en la base de datos
        Company::create($data);

        return redirect()->route('enterprises.list')->with('message', 'Empresa añadida correctamente.');
    }

    // Presenta los detalles de una empresa específica
    public function details(Company $enterprise)
    {
        return view('enterprises.details', ['enterprise' => $enterprise]);
    }

    // Muestra el formulario de modificación de una empresa
    public function modify(Company $enterprise)
    {
        return view('enterprises.modify', ['enterprise' => $enterprise]);
    }

    // volvemos a validar al igual que en el create que los datos son correctos
    public function change(Request $request, Company $enterprise)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'date_creation' => 'nullable|date',
            'professor_id' => 'nullable|integer|exists:professors,id',
        ]);

        // Verificación manual de `professor_id`
        $enterprise->professor_id = $request->input('professor_id') ?? null;

        $enterprise->update($data);

        return redirect()->route('enterprises.list')->with('message', 'Información actualizada con éxito.');
    }

    public function remove(Company $enterprise)
    {
        $enterprise->delete();
        return redirect()->route('enterprises.list')->with('message', 'Empresa eliminada exitosamente.');
    }
}