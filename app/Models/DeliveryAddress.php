<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class DeliveryAddress extends Model
{
    use HasFactory;


    // Mass Assignment: https://laravel.com/docs/10.x/eloquent#mass-assignment
    protected $fillable = [
        'user_id', 'name', 'address', 'city', 'state', 'country', 'pincode', 'status', 'mobile'
    ];



    // Get all the delivery addresses of the currently authenticated/logged-in user    
    public static function deliveryAddresses() {
        $deliveryAddresses = DeliveryAddress::where('user_id', Auth::user()->id)->get()->toArray(); // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user


        return $deliveryAddresses;
    }

}