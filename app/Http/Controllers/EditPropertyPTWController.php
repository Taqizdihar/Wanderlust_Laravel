<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditPropertyPTWController extends Controller {

    public function edit($id) {

        $user = session('user');
        $properties = session('properties');
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan Login Terlebih dahulu');
        }

        if ($user['role'] !== 'ptw') {
            return redirect()->route('login')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $property = collect($properties)->firstWhere('id', (int) $id);

        if (!$property) {
            return redirect()->route('properties.ptw')->with('error', 'Property tidak ditemukan.');
        }
        
        return view('editPropertyPTW', compact('user', 'property'));
    }

    public function update(Request $request, $id) {
        $properties = session('properties', []);

        foreach($properties as &$property) {
            if ($property['id'] == (int) $id) {
                $property['name'] = $request->input('name');
                $property['start_hour'] = $request->input('start_hour');
                $property['end_hour'] = $request->input('end_hour');
                $property['category'] = $request->input('category');
                $property['address'] = $request->input('address');
                $property['description'] = $request->input('description');
                $property['image'] = $request->input('image');
                break;
            }
        }

        session(['properties' => $properties]);

        return redirect()->route('properties.ptw')->with('success', 'Properti berhasil diperbarui.');
    }

    public function destroy($id) {
    $properties = session('properties', []);

    $properties = array_filter($properties, function ($property) use ($id) {
        return $property['id'] != (int) $id;
    });

    session(['properties' => array_values($properties)]);

    return redirect()->route('properties.ptw')->with('success', 'Property berhasil dihapus.');
    }
}
