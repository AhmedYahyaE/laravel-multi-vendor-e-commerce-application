<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsletterSubscriberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // https://www.youtube.com/watch?v=RhJKeFxTT0U&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=212
        // Note: Check DatabaseSeeder.php!
        $subscriberRecords = [
            [
                'id'     => 1,
                'email'  => 'yasser100@yopmail.com',
                'status' => 1
            ],
            [
                'id'     => 2,
                'email'  => 'fouaad@gmail.com',
                'status' => 1
            ]
        ];

        // Note: Check DatabaseSeeder.php!
        \App\Models\NewsletterSubscriber::insert($subscriberRecords);
    }
}
