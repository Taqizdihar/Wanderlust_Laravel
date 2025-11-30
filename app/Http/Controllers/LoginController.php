<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\User; 

class LoginController extends Controller {

    public function showLoginForm() {
        return view('login');
    }

    public function authenticate(Request $request) {
        // 1. Validasi input menggunakan 'username' (sesuai nama input form Anda)
        // Menambahkan validasi 'email' karena input harus berformat email
        $credentials = $request->validate([
            'username' => ['required', 'email'], 
            'password' => ['required'],
        ]);

        // 2. Petakan input 'username' dari form ke kunci 'email' untuk Auth::attempt
        $lookup_credentials = [
            'email' => $credentials['username'],
            'password' => $credentials['password'],
        ];

        // 3. Verifikasi Kredensial terhadap database (Auth::attempt)
     if (Auth::attempt($lookup_credentials)) {
   
           // Login Berhasil
           $request->session()->regenerate();
    
           $user = Auth::user(); // User yang sudah di-guard('wisatawan')
        dd($user->role);
            // 4. Redirect berdasarkan Role
            switch ($user->role ?? 'tourist') { 
                case 'admin':
                    return redirect()->route('dashboard.admin');
                case 'ptw':
                    return redirect()->route('dashboard.ptw');
                case 'tourist':
                    return redirect()->route('home');
                default:
                    return redirect()->route('login');
            }
        } 
        
        // Login Gagal
        return back()->withErrors([
            'email' => 'Kredensial tidak valid atau tidak cocok.',
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}