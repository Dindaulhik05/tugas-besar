<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['name' => $credentials['name'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            // Periksa apakah pengguna adalah admin
            if (Auth::user()->is_admin) {
                // Jika admin, arahkan ke dashboard admin
                return redirect()->intended(route('Admin.dashboard'))->with('success', 'Login berhasil. Selamat datang Admin!');
            } else {
                // Jika bukan admin, arahkan ke dashboard pengguna
                return redirect()->intended('dashboard')->with('success', 'Login berhasil. Selamat datang!');
            }
        }

        return back()->withErrors([
            'name' => 'Username atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}