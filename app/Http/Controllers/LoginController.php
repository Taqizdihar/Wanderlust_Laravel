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
            'role' => 'ptw',
            'pp' => 'ptw-1.jpg'
        ],
        [
            'id' => 2,
            'name' => 'Azura Novalight',
            'username' => 'ikaa',
            'password' => 'admin123',
            'email' => 'azura@wanderlust.com',
            'phone' => '+6282234567891',
            'role' => 'admin',
            'pp' => 'admin-1.jpg'
        ],
        [
            'id' => 3,
            'name' => 'Sena Aurelius',
            'username' => 'sena',
            'password' => 'tourist123',
            'email' => 'sena@example.com',
            'phone' => '+6283234567892',
            'role' => 'tourist',
            'pp' => 'tourist-1.jpg'
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
            if ($user['role'] === 'admin') {
                return redirect()->route('dashboard.admin');
            } elseif ($user['role'] === 'ptw') {
                return redirect()->route('dashboard.ptw');
            } else {
                return redirect()->route('home');
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
