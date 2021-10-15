<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Requst $request)
    {
      $request->validate([
        'email' => 'required|string',
        'password' => 'required|string',
      ]);
    }
}
