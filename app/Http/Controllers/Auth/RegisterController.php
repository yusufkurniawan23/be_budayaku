<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Tambahkan ini jika belum ada

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'alamat' => 'nullable|string|max:255', // Validasi untuk alamat
            'nomor' => 'nullable|numeric|digits_between:10,15', // Validasi untuk nomor HP
            'role' => 'required|in:user,admin',
        ]);

        // Simpan user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat, // Simpan alamat
            'nomor' => $request->nomor, // Simpan nomor HP
            'role' => $request->role,
        ]);

        // Login otomatis setelah register
        Auth::login($user); // Gunakan Auth::login()

        // Arahkan ke dashboard sesuai role
        if ($user->role === 'admin') {
            return redirect()->route('layouts.app'); // Ganti sesuai nama route admin
        } else {
            return redirect()->route('layouts.homepage'); // Ganti sesuai nama route user
        }
    }
}
