<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin/dashboard'); // is the same as:    return view('admin.dashboard');
    }

    public function login() {
        // Hashing Passwords: https://laravel.com/docs/9.x/hashing#hashing-passwords
        // echo $password = \Illuminate\Support\Facades\Hash::make('123456');
        // die;


        return view('admin/login'); // is the same as:    return view('admin.login');
    }
}
