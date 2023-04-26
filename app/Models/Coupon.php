<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;



    // Check 5:53 in https://www.youtube.com/watch?v=l4egzHaPfBI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=203
    public static function couponDetails($coupon_code) {
        $couponDetails = Coupon::where('coupon_code', $coupon_code)->first()->toArray();


        return $couponDetails;
    }
}
