<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfessorRequest;
use App\Models\Professor;
use Illuminate\Http\JsonResponse;
class PorfessorApi extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Professor::all());
    }
    public function store(ProfessorRequest $request): JsonResponse
    {
        $professor = Professor::create($request->validated());
        return response()->json($professor, 201);
    }
    public function show(Professor $professor): JsonResponse
    {
        return response()->json($professor);
    }
    public function update(ProfessorRequest $request, Professor $professor): JsonResponse
    {
        $professor->update($request->validated());
        return response()->json($professor);
    }
    public function destroy(Professor $professor): JsonResponse
    {
        $professor->delete();
        return response()->json(null, 204);
    }
}