<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    //
    function register(Request $req)
    {
        // Data Validation
        $validator = Validator::make($req->all(), [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create User
        $user = new User;
        $user->username = $req->input('username');
        $user->email = $req->input('email');
        $user->password = Hash::make($req->input('password'));

        $user->save();

        // Success Response (consider sending verification email or token)
        return response()->json([
            'message' => 'User created successfully!',
            'user' => $user // You can choose to exclude sensitive data like password
        ], 201);
    }
}
