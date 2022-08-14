<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Databas Seeding: Check 15:59 in https://www.youtube.com/watch?v=LfK-eMcUJsw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=20
        // Note: Check DatabaseSeeder.php
        $vendorRecords = [
            'id'      => 1,
            'name'    => 'John',
            'address' => 'CP-112',
            'city'    => 'New Delhi',
            'state'   => 'Delhi',
            'country' => 'India',
            'pincode' => '110001',
            'mobile'  => '9700000000',
            'email'   => 'john@admin.com',
            'status'  => 1,
        ];

        // Note: Check DatabaseSeeder.php
        \App\Models\Vendor::insert($vendorRecords);
    }
}
