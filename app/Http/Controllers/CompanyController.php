<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    // Obtener todas las compañías
    public function index()
    {
        return CompanyResource::collection(Company::all());
    }

    // Crear una nueva compañía
    public function store(CompanyRequest $request)
    {
        $company = Company::create($request->validated());
        return new CompanyResource($company);
    }

    // Obtener una compañía específica
    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    // Actualizar una compañía
    public function update(CompanyRequest $request, Company $company)
    {
        $company->update($request->validated());
        return new CompanyResource($company);
    }

    // Eliminar una compañía
    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json(["message" => "Compañía eliminada exitosamente"], 200);
    }
}