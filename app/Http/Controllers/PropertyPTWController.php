<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyPTWController extends Controller
{
    public function index()
    {
        // Data pemilik (sama seperti di dashboard)
        $owner = [
            'name' => 'M. Alnilam Lambda',
            'title' => 'Minister of Tourism',
            'photo' => 'images/owner.jpg',
        ];

        // Data properti (sementara dalam array)
        $properties = [
            [
                'name' => 'The Fairy Tale Land',
                'hours' => '08:00 - 20:00',
                'category' => 'Nature',
                'image' => 'images/fairy-tale-land.jpg'
            ],
            [
                'name' => 'The Ancient Temple',
                'hours' => '09:00 - 18:00',
                'category' => 'Historical',
                'image' => 'images/ancient-temple.jpg'
            ],
        ];

        return view('propertiesPTW', compact('owner', 'properties'));
    }
}
