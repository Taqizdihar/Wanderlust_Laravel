<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddPropertyPTWController extends Controller
{
    public function index() {

        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan Login Terlebih dahulu');
        }

        if ($user['role'] !== 'ptw') {
            return redirect()->route('login')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
        
        return view('AddPropertyPTW', compact('user'));
    }

    public function store(Request $request) {
        $properties = session('properties', []);

        $newID = count($properties) + 1;

        $newProperty = [
            'id' => $newID,
            'name' => $request->input('name'),
            'start_hour' => $request->input('start_hour'),
            'end_hour' => $request->input('end_hour'),
            'category' => $request->input('category'),
            'revenue' => 0,
            'visitors' => 0,
            'tickets_sold' => 0,
            'image' => $request->input('image'),
        ];

        $properties[] = $newProperty;

        session(['properties' => $properties]);

        return redirect()->route('properties.ptw')->with('success', 'Properti baru berhasil ditambahkan.');
    }
}
