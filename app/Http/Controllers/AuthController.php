<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth(LoginRequest $request)
    {
        $credentials = $request->only("email", "telefone");

        $user = Cliente::where("email", $request->email)->first();

        Hash::check($request->telefone, $user->telefone);
        if (!$user || !Hash::check($request->telefone, $user->telefone)) {
            throw ValidationException::withMessages([
                "email" =>  "The provided credentials are incorret",
                "telefone" => "The provided credentials are incorret"
            ]);
        }

        $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user, 
            
        ]);
    }

  
}
