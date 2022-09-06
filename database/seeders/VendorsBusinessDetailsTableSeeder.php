<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // https://www.youtube.com/watch?v=wMJH5FrP1G8&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=21
        // Note: Check DatabaseSeeder.php
        $vendorsBusinessDetailsRecords = [
            [
                'id'                      => 1,
                'vendor_id'               => 1,
                'shop_name'               => 'John Electronics Store',
                'shop_address'            => '1234-SCF',
                'shop_city'               => 'New Delhi',
                'shop_state'              => 'Delhi',
                'shop_country'            => 'India',
                'shop_pincode'            => '110001',
                'shop_mobile'             => '9700000000',
                'shop_website'            => 'sitemakers.in',
                'shop_email'              => 'john@admin.com',
                'address_proof'           => 'Passport',
                'address_proof_image'     => 'test.jpg',
                'business_license_number' => '1234556',
                'gst_number'              => '446444664',
                'pan_number'              => '2135446',
            ],
        ];
        // Note: Check DatabaseSeeder.php
        \App\Models\VendorsBusinessDetail::insert($vendorsBusinessDetailsRecords);
    }
}
