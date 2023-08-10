<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        // My code: (Check DatabaseSeeder.php page too)
        // Database Seeding    // https://laravel.com/docs/9.x/seeding
        // Note: Check DatabaseSeeder.php
        $adminRecords = [
            [
                'id'        => 1,
                'name'      => 'Ahmed Yahya',
                'type'      => 'superadmin',
                'vendor_id' => 0, // `vendor_id` is zero 0 because 'type' is not 'vendor' (it's actually 'superadmin')
                'mobile'    => '9800000000',
                'email'     => 'admin@admin.com',
                'password'  => '$2a$12$xvkjSScUPRexfcJTAy9ATutIeGUuRgJrjDIdL/.xlrddEvRZINpeC', // This is the encryption of '123456'    // using https://bcrypt-generator.com/
                'image'     => '',
                'status'    => 1,
            ],

            
            [
                'id'        => 2,
                'name'      => 'John Singh - Vendor',
                'type'      => 'vendor',
                'vendor_id' => 1, // `vendor_id` is one 1 because 'type' is 'vendor'
                'mobile'    => '9700000000',
                'email'     => 'john@admin.com',
                'password'  => '$2a$12$xvkjSScUPRexfcJTAy9ATutIeGUuRgJrjDIdL/.xlrddEvRZINpeC', // This is the encryption of '123456'    // using https://bcrypt-generator.com/
                'image'     => '',
                'status'    => 1, // Our authentication logic in the login() method in the AdminController won't allow this admin logging in in case of 'status' = 0
            ],
        ];
        // Note: Check DatabaseSeeder.php
        \App\Models\Admin::insert($adminRecords);
    }
}
