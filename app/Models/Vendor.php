<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;


    // Relationship of a Vendor `vendors` with VendorsBusinessDetail `vendors_business_details` (every product belongs to a vendor)    
    public function vendorbusinessdetails() {    
        return $this->belongsTo('App\Models\VendorsBusinessDetail', 'id', 'vendor_id'); // 'vendor_id' is the Foreign Key of the Relationship    // Defining The Inverse Of The Relationship: https://laravel.com/docs/9.x/eloquent-relationships#one-to-one-defining-the-inverse-of-the-relationship
    }



    
    public static function getVendorShop($vendorid) { // this method is called (used) in vendorListing() method in Front/ProductsController.php
        $getVendorShop = \App\Models\VendorsBusinessDetail::select('shop_name')->where('vendor_id', $vendorid)->first()->toArray();


        return $getVendorShop['shop_name'];
    }

    // Get Vendor's Commission Percentage that they must pay for the Website Owner from `commission` column of `vendors` table    
    public static function getVendorCommission($vendor_id) {
        $getVendorCommission = Vendor::select('commission')->where('id', $vendor_id)->first()->toArray();


        return $getVendorCommission['commission'];
    }

}