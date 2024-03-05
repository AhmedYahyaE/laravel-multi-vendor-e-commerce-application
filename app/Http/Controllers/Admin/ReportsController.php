<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function salesReports() {
        $orders = [];

        return view('admin.reports.sales')->with(compact('orders'));
    }
}