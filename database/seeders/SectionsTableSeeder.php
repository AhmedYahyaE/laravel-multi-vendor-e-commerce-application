<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
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
        $sectionRecords = [
            ['id' => 1, 'name' => 'Clothing'   , 'status' => 1],
            ['id' => 2, 'name' => 'Electronics', 'status' => 1],
            ['id' => 3, 'name' => 'Appliances' , 'status' => 1],
        ];

        // Note: Check DatabaseSeeder.php
        \App\Models\Section::insert($sectionRecords);
    }
}
