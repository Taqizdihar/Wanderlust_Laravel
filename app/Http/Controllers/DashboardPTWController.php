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
                'revenue' => 35000000,
                'visitors' => 1200,
                'tickets_sold' => 450,
            ],
            [
                'id' => 2,
                'name' => 'The Ancient Temple',
                'revenue' => 42000000,
                'visitors' => 1800,
                'tickets_sold' => 600,
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
