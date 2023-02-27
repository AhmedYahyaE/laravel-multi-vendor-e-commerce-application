<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;


    // Mass Assignment: https://laravel.com/docs/10.x/eloquent#mass-assignment    // Check 5:56 in // https://www.youtube.com/watch?v=2vgBjI0i23M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=156
    protected $fillable = [
        'user_id', 'name', 'address', 'city', 'state', 'country', 'pincode', 'status', 'mobile'
    ];



    // Get all the delivery addresses of the currently authenticated/logged-in user    // https://www.youtube.com/watch?v=qzLinru4vkU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=152
    public static function deliveryAddresses() {
        $deliveryAddresses = DeliveryAddress::where('user_id', \Auth::user()->id)->get()->toArray(); // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user


        return $deliveryAddresses;
    }

}
