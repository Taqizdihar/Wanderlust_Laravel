<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('kelola_user'); // Blade pakai dummy sendiri
    }
}
