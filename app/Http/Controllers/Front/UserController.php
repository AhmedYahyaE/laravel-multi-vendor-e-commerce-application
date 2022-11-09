<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // https://www.youtube.com/watch?v=xYzsUn8_NT0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127



    // Render User Login/Register (front/users/login_register.blade.php)    // https://www.youtube.com/watch?v=xYzsUn8_NT0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127
    public function loginRegister() {
        return view('front.users.login_register');
    }
}
