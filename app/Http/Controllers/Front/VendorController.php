<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    // https://www.youtube.com/watch?v=ODwOtaa2GxU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=98



    public function loginRegister() {
        return view('front.vendors.login_register');
    }
}
