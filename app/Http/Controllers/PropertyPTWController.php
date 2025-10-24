<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyPTWController extends Controller
{
    public function index()
    {
        $user = session('user');
        $properties = session('properties', []);

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan Login Terlebih dahulu');
        }

        if ($user['role'] !== 'ptw') {
            return redirect()->route('login')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return view('propertiesPTW', compact('user', 'properties'));
    }
}
