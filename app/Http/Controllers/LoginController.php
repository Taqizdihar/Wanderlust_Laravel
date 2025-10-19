<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller {
    
    public function showLoginForm()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = GlobalArray::checkLogin($username, $password);

        if ($user) {

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
}
