<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

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
        $adminRecords = [
            [
                'id'        => 1,
                'name'      => 'Super Admin',
                'type'      => 'superadmin',
                'vendor_id' => 0,
                'mobile'    => '9800000000',
                'email'     => 'admin@admin.com',
                'password'  => '$2a$12$xvkjSScUPRexfcJTAy9ATutIeGUuRgJrjDIdL/.xlrddEvRZINpeC', // using https://bcrypt-generator.com/
                'image'     => '',
                'status'    => 1,
            ],
        ];
        
        Admin::insert($adminRecords);
    }
}
