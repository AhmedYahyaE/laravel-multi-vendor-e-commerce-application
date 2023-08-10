<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        // Databas Seeding
        // Note: Check DatabaseSeeder.php
        $productAttributesRecords = [
            // Note: The three attributes we will insert ALL are related to one product (T-shirt): small, medium and large sizes of one T-shirt
            [
                'id'         => 1,
                'product_id' => 2,
                'size'       => 'Small',
                'price'      => 1000,
                'stock'      => 10,
                'sku'        => 'RC001-S', // SKU is similar to Product Code then hypen -Size (which is S here which means 'small' size)
                'status'     => 1
            ],
            [
                'id'         => 2,
                'product_id' => 2,
                'size'       => 'Medium',
                'price'      => 1100,
                'stock'      => 15,
                'sku'        => 'RC001-M', // SKU is similar to Product Code then hypen -Size (which is S here which means 'medium' size)
                'status'     => 1
            ],
            [
                'id'         => 3,
                'product_id' => 2,
                'size'       => 'Large',
                'price'      => 1200,
                'stock'      => 20,
                'sku'        => 'RC001-L', // SKU is similar to Product Code then hypen -Size (which is S here which means 'large' size)
                'status'     => 1
            ],
        ];



        // Note: Check DatabaseSeeder.php
        \App\Models\ProductsAttribute::insert($productAttributesRecords);
    }
}
