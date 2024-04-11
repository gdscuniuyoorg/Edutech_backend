<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function login(Request $request)
    {
        // Data Validation
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt Login
        if (Auth::attempt($credentials)) {
            // Retrieve authenticated user
            $user = Auth::user();

            return response()->json([
                'message' => 'Login successful!',
                'user' => $user->only('id', 'name', 'email'),
            ], 200);
        }

        // Login Failed
        return response()->json([
            'message' => 'Invalid credentials.',
        ], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json([
            'message' => 'Successfully logged out!',
        ], 200);
    }
}
