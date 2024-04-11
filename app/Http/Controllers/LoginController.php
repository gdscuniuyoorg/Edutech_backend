<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    function login(Request $req)
    {
        // Data Validation (optional but recommended)
        $validator = Validator::make($req->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Attempt Login using Email
        $email = $req->input('email');
        $password = $req->input('password');

        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            // Login Successful
            $user = auth()->user(); // Get authenticated user details

            // You can generate a token for further authentication (optional)
            // $token = $user->createToken('MyAppToken')->plainTextToken;

            return response()->json([
                'message' => 'Login successful!',
                'user' => $user // Consider excluding sensitive data
            ], 200);
        }

        // Login Failed (consider rate limiting attempts for security)
        return response()->json([
            'message' => 'Invalid email or password.',
        ], 401);
    }

}
