<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Note: Check DatabaseSeeder.php!
        $orderStatusRecords = [
            [
                'id'     => 1,
                'name'   => 'New',
                'status' => 1
            ],
            [
                'id'     => 2,
                'name'   => 'Pending',
                'status' => 1
            ],
            [
                'id'     => 3,
                'name'   => 'Canceled',
                'status' => 1
            ],
            [
                'id'     => 4,
                'name'   => 'In Progress',
                'status' => 1
            ],
            [
                'id'     => 5,
                'name'   => 'Shipped',
                'status' => 1
            ],
            [
                'id'     => 6,
                'name'   => 'Partially Shipped', // if one order has products from different vendors, and one vendor has shipped their product to the customer while other vendor (or vendors) didn't!
                'status' => 1
            ],
            [
                'id'     => 7,
                'name'   => 'Delivered',
                'status' => 1
            ],
            [
                'id'     => 8,
                'name'   => 'Partially Delivered', // if one order has products from different vendors, and one vendor has shipped and DELIVERED their product to the customer while other vendor (or vendors) didn't!
                'status' => 1
            ],
            [
                'id'     => 9,
                'name'   => 'Paid',
                'status' => 1
            ]
        ];

        // Note: Check DatabaseSeeder.php!
        \App\Models\OrderStatus::insert($orderStatusRecords);
    }
}
