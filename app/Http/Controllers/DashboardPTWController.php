<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPTWController extends Controller{

    public function index()
    {
        return view('dashboardPTW');
    }
}
