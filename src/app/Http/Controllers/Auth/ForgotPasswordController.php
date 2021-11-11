<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showEmailForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with(['status' => __($status)]);
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }

    public function showResetPasswordForm(Request $request, $token = null)
    {
        $email = $request->email;
        return view('auth.passwords.reset-password', ['email' => $email, 'token' => $token]);
    }

    public function ResetPassword(Request $request)
    {
        dd($request);
        // $request->validate([
        //     'token' => 'required',
        // ]);
    }
}
