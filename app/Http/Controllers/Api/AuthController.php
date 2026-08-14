<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        
        $data = [
            'message' => 'Usuario registrado correctamente',
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];

        return response()->json($data, 201);
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(!Auth::attempt($request->only('email', 'password'))){
            $data = [
                'message' => 'Unauthorized'
            ];
            return response()->json($data, 401);
        }

        $user = $request->user();

        $token = $user->createToken('auth_token')->plainTextToken;

        $data = [
            'message' => 'Bienvenido! '.$user->name,
            'accessToken' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ];

        return response()->json($data, 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        $data = [
            'message'=> 'Se acaba de cerrar sesion correctamente'
        ];

        return response()->json($data, 200);
    }
}
