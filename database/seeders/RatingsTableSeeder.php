<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // https://www.youtube.com/watch?v=xYDsEiQBXzk&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=225
        // Note: Check DatabaseSeeder.php!
        $ratingRecords = [
            [
                'id'         => 1,
                'user_id'    => 2,
                'product_id' => 1,
                'review'     => 'It\'s a great mobile phone!',
                'rating'     => 4,
                'status'     => 1
            ],
            [
                'id'         => 2,
                'user_id'    => 2,
                'product_id' => 2,
                'review'     => 'Awesome product!',
                'rating'     => 5,
                'status'     => 1
            ]
        ];

        // Note: Check DatabaseSeeder.php!
        \App\Models\Rating::insert($ratingRecords);
    }
}
