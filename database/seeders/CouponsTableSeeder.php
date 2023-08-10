<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Note: Check DatabaseSeeder.php!
        $couponRecords = [
            [
                'id'            => 1,
                'vendor_id'     => 0,
                'coupon_option' => 'Manual',
                'coupon_code'   => 'test10',
                'categories'    => 1,
                'users'         => '', // empty string means coupon is for ALL users
                'coupon_type'   => 'Single Time',
                'amount_type'   => 'Percentage',
                'amount'        => 10,
                'expiry_date'   => '2022-12-31', // MySQL date format Y-M-D
                'status'        => 1
            ],
            [
                'id'            => 2,
                'vendor_id'     => 1,
                'coupon_option' => 'Manual',
                'coupon_code'   => 'test20',
                'categories'    => 1,
                'users'         => '', // empty string means coupon is for ALL users
                'coupon_type'   => 'Single Time',
                'amount_type'   => 'Percentage',
                'amount'        => 20,
                'expiry_date'   => '2022-12-31', // MySQL date format Y-M-D
                'status'        => 1
            ],
        ];

        // Note: Check DatabaseSeeder.php!
        \App\Models\Coupon::insert($couponRecords);
    }
}
