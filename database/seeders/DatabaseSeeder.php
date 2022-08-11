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
        $this->call(AdminsTableSeeder::class);
    }
}
