<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        
        // Note: Check DatabaseSeeder.php!
        $brandRecords = [
            ['id' => 1, 'name' => 'Arrow'  , 'status' => 1],
            ['id' => 2, 'name' => 'Gap'    , 'status' => 1],
            ['id' => 3, 'name' => 'Lee'    , 'status' => 1],
            ['id' => 4, 'name' => 'Samsung', 'status' => 1],
            ['id' => 5, 'name' => 'LG'     , 'status' => 1],
            ['id' => 6, 'name' => 'Lenovo' , 'status' => 1],
            ['id' => 7, 'name' => 'MI'     , 'status' => 1],
        ];
        // Note: Check DatabaseSeeder.php!
        \App\Models\Brand::insert($brandRecords);
    }
}
