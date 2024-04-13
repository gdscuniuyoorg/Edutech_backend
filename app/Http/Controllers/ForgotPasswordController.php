<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
class ForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;
    function forgotPassword (Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Handle success or failure based on $status (e.g., flash message)

        return back(); // Redirect back to the form or a confirmation page
    }

}
