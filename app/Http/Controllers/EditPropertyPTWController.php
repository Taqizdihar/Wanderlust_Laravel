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
                $property['category'] = $request->input('category');
                $property['address'] = $request->input('address');
                $property['description'] = $request->input('description');

                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $filename = $file->getClientOriginalName();
                    $file->move(public_path('images/properties'), $filename);
                    $property['image'] = $filename;
                } else {
                    $property['image'] = $property['image'] ?? 'default.png';
                }

                if ($request->filled('start_hour')) {
                    $property['start_hour'] = $request->input('start_hour');

                } else {
                    $property['start_hour'] = $property['start_hour'];
                }

                if ($request->filled('end_hour')) {
                    $property['end_hour'] = $request->input('end_hour');
                } else {
                    $property['end_hour'] = $property['end_hour'];
                }

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
