<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // https://www.youtube.com/watch?v=anlZdqno-nw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=151
        // Note: Check DatabaseSeeder.php!
        $deliveryRecords = [
            [
                'id'      => 1,
                'user_id' => 1,
                'name'    => 'Amit Gupta',
                'address' => '123-a',
                'city'    => 'New Delhi',
                'state'   => 'Delhi',
                'country' => 'India',
                'pincode' => 10001,
                'mobile'  => 9800000000,
                'status'  => 1
            ],
            [
                'id'      => 2,
                'user_id' => 1, // the same user_id in the previous record which means the the delivery address is for the same person
                'name'    => 'Amit Gupta',
                'address' => '12345-a',
                'city'    => 'Ludhiana',
                'state'   => 'Punjab',
                'country' => 'India',
                'pincode' => 141001,
                'mobile'  => 9700000000,
                'status'  => 1
            ],
        ];

        // Note: Check DatabaseSeeder.php!
        \App\Models\DeliveryAddress::insert($deliveryRecords);
    }
}
