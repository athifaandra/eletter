<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'nip' => ['required', 'numeric'], // Hanya memperbolehkan angka
            'password' => ['required', 'string'],
        ]);

        // Coba untuk login
        if (Auth::attempt(['nip' => $request->nip, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Anda berhasil Login!');
            } elseif ($user->role === 'head') {
                return redirect()->route('headoffice.dashboard')->with('success', 'Anda berhasil Login!');
            } else {
                return redirect()->route('staff.dashboard')->with('success', 'Anda berhasil Login!');
            }
        } else {
            // Jika gagal login
            return redirect()->route('login')->with('error', 'NIP atau Password Anda Salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
