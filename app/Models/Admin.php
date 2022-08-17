<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// For Multiple Authentication:
use Illuminate\Foundation\Auth\User as Authenticatable; // https://laravel.com/docs/9.x/authentication#the-authenticatable-contract    // https://laravel.com/api/9.x/Illuminate/Contracts/Auth/Authenticatable.html



// class Admin extends Model
// Check 12:47 in https://www.youtube.com/watch?v=_vBCl-77GYc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=11
class Admin extends Authenticatable // Check 12:47 in https://www.youtube.com/watch?v=_vBCl-77GYc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=11
{
    use HasFactory;


    // Multiple Authentication: https://www.youtube.com/watch?v=y8FmOIRRi2I&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=11    // https://laravel.com/docs/9.x/passport#multiple-authentication-guards
    // https://stackoverflow.com/questions/58230637/what-does-guard-do    // https://www.google.com/search?q=protected+%24guard+in+laravel&oq=protected+%24guard+in+laravel&aqs=chrome..69i57j0i22i30j0i390l2.5432j1j7&sourceid=chrome&ie=UTF-8
    protected $guard = 'admin'; // Check auth.php file, where we added (in two places) the 'admin' Authentication Guard and 'admin' User Provider



    // Defining the relationships    // https://www.youtube.com/watch?v=dwhBAyFPgFs&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=27
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
