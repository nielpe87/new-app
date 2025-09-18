<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function generateToken(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
             $token = $request->user()->createToken('accessToken');
            return response()->json(['accessToken' => $token->plainTextToken]);

        } else {
            return response()->json(['message' => "Crediciais inválidas"], 403);
        }


    }
}
