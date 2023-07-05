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



        // Our code:
        // Note: Check the Seeder Classes files: CategoriesTableSeeder, ProductsTableSeeder, ... etc!!!
        // Database Seeding: Check    AdminsTableSeeder.php    // Calling Additional Seeders: https://laravel.com/docs/9.x/seeding#calling-additional-seeders
        // Databas Seeding: Check 15:59 in https://www.youtube.com/watch?v=LfK-eMcUJsw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=20
        // https://www.youtube.com/watch?v=wMJH5FrP1G8&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=21
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
        $this->call(CouponsTableSeeder::class);              // https://www.youtube.com/watch?v=egx7-Hmb63Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=142
        $this->call(DeliveryAddressTableSeeder::class);      // https://www.youtube.com/watch?v=anlZdqno-nw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=151
        $this->call(OrderStatusTableSeeder::class);          // https://www.youtube.com/watch?v=W-aEaJQGeKE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=167
        $this->call(OrderItemStatusTableSeeder::class);      // https://www.youtube.com/watch?v=QEdO_maniDY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=168
        $this->call(NewsletterSubscriberTableSeeder::class); // https://www.youtube.com/watch?v=RhJKeFxTT0U&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=212
        $this->call(RatingsTableSeeder::class);              // https://www.youtube.com/watch?v=xYDsEiQBXzk&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=225
    }
}
