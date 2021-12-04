<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->only('username', 'password');
        return Auth::attempt(['identity_number' => $credentials['username'], 'password' => $credentials['password']]) ? redirect()->intended('/') : redirect()->back()->withInput()->withErrors(['username' => 'Username atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
