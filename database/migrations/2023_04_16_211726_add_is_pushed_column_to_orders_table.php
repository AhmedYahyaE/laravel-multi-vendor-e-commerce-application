<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Shiprocket API Integration
            // Add `is_pushed` column to `orders` table where 0 means Order has NOT been pushed to Shiprocket API, while 1 means Order has been pushed to Shiprocket API    
            $table->tinyInteger('is_pushed')->after('tracking_number')->default(0)->comment('Order pushed to Shiprocket or NOT'); // Comment(): https://laravel.com/docs/9.x/migrations#main-content:~:text=%2D%3E-,comment,-(%27my%20comment%27)    // https://laravel.com/docs/9.x/migrations#main-content:~:text=you%20may%20invoke,the%20table%20instance
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Reverse the operation in case that we want to rollback changes (using the    php artisan migrate:rollback    command): Reverse what's done in the up() method: Delete the `is_pushed` column from `orders` table    
            $table->dropColumn('is_pushed');
        });
    }
};
