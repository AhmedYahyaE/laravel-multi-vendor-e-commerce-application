<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add `courier_name` and `tracking_number` columns to `orders` table    
        Schema::table('orders', function($table) {
            $table->string('courier_name')->after('grand_total')->nullable();
            $table->string('tracking_number')->after('courier_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Reverse the operation in case that we want to rollback changes (using the    php artisan migrate:rollback    command): Reverse what's done in the up() method: Delete `courier_name` and `tracking_number` columns from `orders` table    
        Schema::table('orders', function($table) {
            $table->dropColumn('courier_name');
            $table->dropColumn('tracking_number');
        });
    }
};
