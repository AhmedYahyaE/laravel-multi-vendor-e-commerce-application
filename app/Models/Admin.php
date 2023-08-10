<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// For Multiple Authentication:
use Illuminate\Foundation\Auth\User as Authenticatable; // https://laravel.com/docs/9.x/authentication#the-authenticatable-contract    // https://laravel.com/api/9.x/Illuminate/Contracts/Auth/Authenticatable.html



// class Admin extends Model

class Admin extends Authenticatable 
{
    use HasFactory;


    // Multiple Authentication    // https://laravel.com/docs/9.x/passport#multiple-authentication-guards
    protected $guard = 'admin'; // Check auth.php file, where we added (in two places) the 'admin' Authentication Guard and 'admin' User Provider



    // Defining the relationships    
    // An admin belongs to a vendor (the inverse of the relationship)

    public function vendorPersonal() { // relationship between `admins` and `vendors` table
        return $this->belongsTo('App\Models\Vendor', 'vendor_id'); // 'vendor_id' is the foreign key of the `admins` table
    }

    public function vendorBusiness() { // relationship between `admins` and `vendors_business_details` table
        return $this->belongsTo('App\Models\VendorsBusinessDetail', 'vendor_id'); // 'vendor_id' is the foreign key of the `admins` table
    }

    public function vendorBank() { // relationship between `admins` and `vendors_bank_details` table
        return $this->belongsTo('App\Models\VendorsBankDetail', 'vendor_id'); // 'vendor_id' is the foreign key of the `admins` table
    }
}