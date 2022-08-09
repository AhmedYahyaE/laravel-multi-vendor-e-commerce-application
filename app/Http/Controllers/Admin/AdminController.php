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
        return view('admin/login'); // is the same as:    return view('admin.login');
    }
}
