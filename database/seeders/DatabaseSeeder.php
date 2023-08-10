<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ProductsFilter;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        // My code:
        // Note: Check the Seeder Classes files: CategoriesTableSeeder, ProductsTableSeeder, ... etc!!!
        // Database Seeding: Check    AdminsTableSeeder.php    // Calling Additional Seeders: https://laravel.com/docs/9.x/seeding#calling-additional-seeders
        // Databas Seeding
        
        $this->call(AdminsTableSeeder::class);
        $this->call(VendorsTableSeeder::class);
        $this->call(VendorsBusinessDetailsTableSeeder::class);
        $this->call(VendorsBankDetailsTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductsAttributesTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(FiltersTableSeeder::class);
        $this->call(FiltersValuesTableSeeder::class);
        $this->call(CouponsTableSeeder::class);              
        $this->call(DeliveryAddressTableSeeder::class);      
        $this->call(OrderStatusTableSeeder::class);          
        $this->call(OrderItemStatusTableSeeder::class);      
        $this->call(NewsletterSubscriberTableSeeder::class); 
        $this->call(RatingsTableSeeder::class);              
    }
}
