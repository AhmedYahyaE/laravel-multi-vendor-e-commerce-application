<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
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
        $bannerRecords = [
            [
                'id'     => 1,
                'image'  => 'banner-1.jpg',
                'type'   => 'Slider',
                'link'   => 'spring-collection', // e.g. www.our-domainname.com/spring-collection
                'title'  => 'Spring Collection',
                'alt'    => 'Spring Collection',
                'status' => 1
            ],
            [
                'id'     => 2,
                'image'  => 'banner-2.jpg',
                'type'   => 'Slider',
                'link'   => 'tops', // e.g. www.our-domainname.com/tops
                'title'  => 'Tops',
                'alt'    => 'Tops',
                'status' => 1
            ],
        ];
        // Note: Check DatabaseSeeder.php!
        \App\Models\Banner::insert($bannerRecords);
    }
}
