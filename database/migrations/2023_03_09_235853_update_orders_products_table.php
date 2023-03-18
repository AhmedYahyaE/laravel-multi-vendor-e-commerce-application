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
        // Add `courier_name` and `tracking_number` columns to `orders_products` table    // https://www.youtube.com/watch?v=WNCFYaSv-N4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=173
        Schema::table('orders_products', function($table) {
            $table->string('courier_name')->after('item_status')->nullable();
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
        // Reverse the operation in case that we want to rollback changes (using the    php artisan migrate:rollback    command): Reverse what's done in the up() method: Delete `courier_name` and `tracking_number` columns from `orders_products` table    // https://www.youtube.com/watch?v=WNCFYaSv-N4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=173
        Schema::table('orders_products', function($table) {
            $table->dropColumn('courier_name');
            $table->dropColumn('tracking_number');
        });
    }
};
