<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister() { return view('auth.register'); }

    public function register(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username, // Diubah ke username
            'password' => Hash::make($request->password),
            'role' => 'user', 
        ]);
        Auth::login($user);
        return redirect('/dashboard');
    }

    public function showLogin() { return view('auth.login'); }

    public function login(Request $request) {
        // Cek login menggunakan username
        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect('/dashboard');
        }
        return back()->withErrors(['username' => 'Username atau password salah']);
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}