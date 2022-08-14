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


        // Our code: (Check DatabaseSeeder.php page too)
        // Database Seeding: https://www.youtube.com/watch?v=UaZ3Zoa4c8U&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=11    // https://laravel.com/docs/9.x/seeding
        // Note: Check DatabaseSeeder.php
        $adminRecords = [
            [
                'id'        => 1,
                'name'      => 'Super Admin',
                'type'      => 'superadmin',
                'vendor_id' => 0,
                'mobile'    => '9800000000',
                'email'     => 'admin@admin.com',
                'password'  => '$2a$12$xvkjSScUPRexfcJTAy9ATutIeGUuRgJrjDIdL/.xlrddEvRZINpeC', // This is the encryption of '123456'    // using https://bcrypt-generator.com/
                'image'     => '',
                'status'    => 1,
            ],

            // Check 19:39 in https://www.youtube.com/watch?v=LfK-eMcUJsw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=20
            [
                'id'        => 2,
                'name'      => 'John',
                'type'      => 'vendor',
                'vendor_id' => 1,
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
