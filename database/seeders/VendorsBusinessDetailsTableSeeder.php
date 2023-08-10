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
        
        // Note: Check DatabaseSeeder.php
        $vendorsBusinessDetailsRecords = [
            [
                'id'                      => 1,
                'vendor_id'               => 1,
                'shop_name'               => 'John Electronics Store',
                'shop_address'            => '12 Mahmoud Saeed St.',
                'shop_city'               => 'New Cairo',
                'shop_state'              => 'Cairo',
                'shop_country'            => 'Egypt',
                'shop_pincode'            => '110001',
                'shop_mobile'             => '1253247745',
                'shop_website'            => 'amazon.com.eg',
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
