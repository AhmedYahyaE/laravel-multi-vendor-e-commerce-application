<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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



        // Our code:
        // Database Seeding: Check    AdminsTableSeeder.php    // Calling Additional Seeders: https://laravel.com/docs/9.x/seeding#calling-additional-seeders
        // Databas Seeding: Check 15:59 in https://www.youtube.com/watch?v=LfK-eMcUJsw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=20
        // https://www.youtube.com/watch?v=wMJH5FrP1G8&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=21
        // $this->call(AdminsTableSeeder::class);
        // $this->call(VendorsTableSeeder::class);
        // $this->call(VendorsBusinessDetailsTableSeeder::class);
        // $this->call(VendorsBankDetailsTableSeeder::class);
        // $this->call(SectionsTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
    }
}
