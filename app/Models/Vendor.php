<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;


    // Note!!: Total B.S.!!
    // Relationship of a Vendor `vendors` with VendorsBusinessDetail `vendors_business_details` (every product belongs to a vendor)    // https://www.youtube.com/watch?v=uu8CBDsWD7g&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=109
    public function vendorbusinessdetails() { // vendor() in the SINGULAR!    // A Product `products` belongs to a Vendor `vendors`, and the Foreign Key of the Relationship is the `vendor_id` column
        return $this->belongsTo('App\Models\VendorsBusinessDetail', 'id', 'vendor_id'); // 'vendor_id' is the Foreign Key of the Relationship    // Defining The Inverse Of The Relationship: https://laravel.com/docs/9.x/eloquent-relationships#one-to-one-defining-the-inverse-of-the-relationship
    }



    // https://www.youtube.com/watch?v=S8xbldfdLXc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=111
    public static function getVendorShop($vendorid) { // this method is called (used) in vendorListing() method in Front/ProductsController.php
        $getVendorShop = \App\Models\VendorsBusinessDetail::select('shop_name')->where('vendor_id', $vendorid)->first()->toArray();


        return $getVendorShop['shop_name'];
    }

    // Get Vendor's Commission Percentage that they must pay for the Website Owner from `commission` column of `vendors` table    // https://www.youtube.com/watch?v=2TxZP5zq4Wo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=201
    public static function getVendorCommission($vendor_id) {
        $getVendorCommission = Vendor::select('commission')->where('id', $vendor_id)->first()->toArray();


        return $getVendorCommission['commission'];
    }

}
