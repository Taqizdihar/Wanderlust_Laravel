<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPTWController extends Controller{

    public function index()
    {
        $owner = [
            'name' => 'M. Alnilam Lambda',
            'title' => 'Minister of Tourism',
            'photo' => 'images/default-avatar.png',
        ];

        $summary = [
            'properties' => 2,
            'tickets_sold' => 0,
            'revenue' => 0,
            'visitors' => 0,
        ];

        return view('dashboardPTW', compact('owner', 'summary'));
    }
}
