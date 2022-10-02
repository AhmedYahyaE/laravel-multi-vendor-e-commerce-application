<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiltersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //



        // https://www.youtube.com/watch?v=mV_W5rGIuak&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=82
        // Note: Check DatabaseSeeder.php!
        $filterRecords = [
            [
                'id'            => 1,
                'cat_ids'       => '1, 2, 3, 6, 7, 8',
                'filter_name'   => 'Fabric',
                'filter_column' => 'fabric',
                'status'        => 1,
            ],
            [
                'id'            => 2,
                'cat_ids'       => '4, 5', // a filter for 'Mobiles' and 'Smartphones' categories
                'filter_name'   => 'RAM',
                'filter_column' => 'ram', // e.g. 4gb, 6gb, 8gb, ...
                'status'        => 1,
            ],
        ];
        // Note: Check DatabaseSeeder.php!
        \App\Models\ProductsFilter::insert($filterRecords);
    }
}
