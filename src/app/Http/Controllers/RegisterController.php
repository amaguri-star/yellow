<?php

namespace App\Http\Controllers;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }
}
