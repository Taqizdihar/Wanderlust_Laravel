<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPTWController extends Controller{

    public function index() {
        $user = session('user');
        

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan Login Terlebih dahulu');
        }

        if ($user['role'] !== 'ptw') {
            return redirect()->route('login')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $properties = [
            [
                'id' => 1,
                'name' => 'The Fairy Tale Land',
                'start_hour' => '08:00',
                'end_hour' => '18:00',
                'category' => 'Theme Park',
                'revenue' => 35000000,
                'visitors' => 1200,
                'tickets_sold' => 450,
                'address' => 'Jl. Merpati No. 5, Wonderland City',
                'description' => 'A magical theme park filled with fairy tale characters and enchanting rides.',
                'image' => 'fantasyland.jpg',
            ],
            [
                'id' => 2,
                'name' => 'The Ancient Temple',
                'start_hour' => '09:00',
                'end_hour' => '16:00',
                'category' => 'Historical Site',
                'revenue' => 42000000,
                'visitors' => 1800,
                'tickets_sold' => 600,
                'address' => 'Jl. Candi No. 10, Heritage Town',
                'description' => 'Explore the mysteries of an ancient temple with rich history and stunning architecture.',
                'image' => 'ancienttemple.jpg',
            ],
        ];

        session(['properties' => $properties]);

        $summary = [
            'total_properties' => count($properties),
            'total_revenue' => array_sum(array_column($properties, 'revenue')),
            'total_visitors' => array_sum(array_column($properties, 'visitors')),
            'total_tickets' => array_sum(array_column($properties, 'tickets_sold')),
        ];

        return view('dashboardPTW', compact('user', 'summary'));
    }
}
