<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Registro de nuevo usuario y profesor
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'age' => 'required|integer',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:150',
            'telephone' => 'required|string|max:9',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        DB::beginTransaction();

        try {
            // Crear el usuario
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Crear el profesor asociado al usuario
            $professor = Professor::create([
                'user_id' => $user->id,
                'fullname' => $request->name,
                'email' => $request->email,
                'age' => $request->age,
                'gender' => $request->gender,
                'address' => $request->address,
                'telephone' => $request->telephone,
            ]);

            DB::commit();

            // Respuesta sin token
            return response()->json([
                'message' => 'Usuario registrado exitosamente',
                'user' => $user,
                'professor' => $professor,
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Registration failed: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Login de usuario existente
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $professor = $user->professor;

        // Generar token de acceso
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
            'professor' => $professor,
        ]);
    }

    /**
     * Logout y revocación de token
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout exitoso']);
    }

    /**
     * Obtener el usuario autenticado
     */
    public function user(Request $request)
    {
        $user = $request->user();
        $professor = $user->professor;

        return response()->json([
            'user' => $user,
            'professor' => $professor,
        ]);
    }
}