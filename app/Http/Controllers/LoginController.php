<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller {

    private $users = [
        [
            'id' => 1,
            'name' => 'M. Alnilam Lambda',
            'username' => 'alnilam',
            'password' => 'alnilam123',
            'email' => 'alnilam@wanderlust.com',
            'phone' => '+6281234567890',
            'role' => 'ptw'
        ],
        [
            'id' => 2,
            'name' => 'Azura Novalight',
            'username' => 'azura',
            'password' => 'admin123',
            'email' => 'azura@wanderlust.com',
            'phone' => '+6282234567891',
            'role' => 'admin'
        ],
        [
            'id' => 3,
            'name' => 'Sena Aurelius',
            'username' => 'sena',
            'password' => 'tourist123',
            'email' => 'sena@example.com',
            'phone' => '+6283234567892',
            'role' => 'tourist'
        ],
    ];

    public function showLoginForm() {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = null;
        foreach ($this->users as $u) {
            if ($u['username'] === $username && $u['password'] === $password) {
                $user = $u;
                break;
            }
        }

        if ($user) {
            session(['user' => $user]);

            switch ($user['role']) {
                case 'admin':
                    return redirect()->route('dashboard.admin');
                case 'ptw':
                    return redirect()->route('dashboard.ptw');
                case 'tourist':
                    return redirect()->route('home.tourist');
                default:
                    return redirect()->route('login')->with('error', 'Role tidak dikenali!');
            }
        } else {
            return redirect()->route('login')->with('error', 'Username atau password salah!');
        }
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
