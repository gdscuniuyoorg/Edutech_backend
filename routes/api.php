<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [SessionsController::class, 'login']);
Route::post('logout', [SessionsController::class, 'logout']);


//To refactor and handle properly in controllers later.


// routes/web.php
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    // Handle success or failure based on $status (e.g., flash message)

    return back(); // Redirect back to the form or a confirmation page
})->name('password.request');

// routes/web.php
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();
        }
    );

    // Handle success or failure based on $status (e.g., redirect to login)

    return redirect('/login'); // Redirect to login page on success
})->name('password.reset');

