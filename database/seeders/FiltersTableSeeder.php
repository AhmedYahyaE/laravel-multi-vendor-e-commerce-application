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



        
        // Note: Check DatabaseSeeder.php!
        $filterRecords = [
            [
                'id'            => 1,
                'cat_ids'       => '1,2,3,6,7,8', // Important Note: DON'T separate the `cat_ids` with anything other than commas (i.e. the correct way is like '3,9,7,5,4') in order for the getCategoryName() method in Category.php model to work properly
                'filter_name'   => 'Fabric', // a filter for the 'Cloting' category
                'filter_column' => 'fabric',
                'status'        => 1,
            ],
            [
                'id'            => 2,
                'cat_ids'       => '4,5', // Important Note: DON'T separate the `cat_ids` with anything other than commas (i.e. the correct way is like '3,9,7,5,4') in order for the getCategoryName() method in Category.php model to work properly
                'filter_name'   => 'RAM', // a filter for 'Mobiles' and 'Smartphones' categories
                'filter_column' => 'ram', // e.g. 4gb, 6gb, 8gb, ...
                'status'        => 1,
            ],
        ];
        // Note: Check DatabaseSeeder.php!
        \App\Models\ProductsFilter::insert($filterRecords);
    }
}
