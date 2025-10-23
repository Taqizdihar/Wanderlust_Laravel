<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPTWController extends Controller{

    public function index() {
        $user = GlobalArray::getUserById(2);

        return view('dashboardPTW', compact('user'));
    }
}
