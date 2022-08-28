<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        // Databas Seeding: https://www.youtube.com/watch?v=E5kNg68u3lw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=32
        // Note: Check DatabaseSeeder.php        
        $productRecords = [
            [
                'id'               => 1,
                'section_id'       => 2,
                'category_id'      => 5,
                'brand_id'         => 7,
                'vendor_id'        => 1,
                'admin_type'       => 'vendor',
                'product_name'     => 'Redmi Note 11',
                'product_code'     => 'RN11',
                'product_color'    => 'Blue',
                'product_price'    => 15000,
                'product_discount' => 10,
                'product_weight'   => 500,
                'product_weight'   => 500,
                'product_image'    => '',
                'product_video'    => '',
                'meta_title'       => '',
                'meta_description' => '',
                'meta_keywords'    => '',
                'is_featured'      => 'Yes',
                'status'           => 1,
            ],
            [
                'id'               => 2,
                'section_id'       => 1,
                'category_id'      => 6,
                'brand_id'         => 2,
                'vendor_id'        => 0, // 0 means the superadmin
                'admin_type'       => 'superadmin',
                'product_name'     => 'Red Casual T-Shirt',
                'product_code'     => 'RC001',
                'product_color'    => 'Red',
                'product_price'    => 1000,
                'product_discount' => 20,
                'product_weight'   => 200,
                'product_weight'   => 500,
                'product_image'    => '',
                'product_video'    => '',
                'meta_title'       => '',
                'meta_description' => '',
                'meta_keywords'    => '',
                'is_featured'      => 'Yes',
                'status'           => 1,
            ],
        ];

        // Note: Check DatabaseSeeder.php
        \App\Models\Product::insert($productRecords);
    }
}
