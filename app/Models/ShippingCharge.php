<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCharge extends Model
{
    use HasFactory;


    // https://www.youtube.com/watch?v=igoiH9VVxzs&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=187



    // https://www.youtube.com/watch?v=krS-KXdMQ64&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=190
    public static function getShippingCharges($total_weight , $country) { // this method is used inside checkout() method in Front/ProductsController.php
        // $getShippingCharges = ShippingCharge::select('rate')->where('country', $country)->first();
        $shippingDetails = ShippingCharge::where('country', $country)->first()->toArray(); // https://www.youtube.com/watch?v=FUQyTb1vOI4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=192
        // dd($shippingDetails);

        // https://www.youtube.com/watch?v=FUQyTb1vOI4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=192
        if ($total_weight > 0) {

            if ($total_weight > 0 && $total_weight <= 500) {
                $rate = $shippingDetails['0_500g'];

            } elseif ($total_weight > 500 && $total_weight <= 1000) {
                $rate = $shippingDetails['501g_1000g'];

            } elseif ($total_weight > 1000 && $total_weight <= 2000) {
                $rate = $shippingDetails['1001_2000g'];

            } elseif ($total_weight > 2000 && $total_weight <= 5000) {
                $rate = $shippingDetails['2001g_5000g'];

            } elseif ($total_weight > 5000) {
                $rate = $shippingDetails['above_5000g'];

            } else {
                $rate = 0;
            }
            
        } else {
            $rate = 0;
        }


        // dd($rate);


        // return $getShippingCharges->rate;
        return $rate; // https://www.youtube.com/watch?v=FUQyTb1vOI4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=192
    }
}
