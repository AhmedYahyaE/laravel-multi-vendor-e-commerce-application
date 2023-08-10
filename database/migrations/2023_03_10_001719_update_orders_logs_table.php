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
        // Add `courier_name` and `tracking_number` columns to `orders` table (to use this column to show the order item status in "Item Status" Section in Admin Panel in admin/orders/order_details.blade.php)    
        Schema::table('orders_logs', function($table) {
            $table->integer('order_item_id')->after('order_id')->nullable(); // Foreign Key to the `id` column in `orders_products` table    // It will be zero 0 if the "Update Order Status" Section is updated by an 'admin' (ONLY), and if the "Item Status" Section is updated (by a 'vendor' or 'admin'), it will take the value of the `id` column in `orders_products` table. Check updateOrderItemStatus() method in Admin/OrderController.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Reverse the operation in case that we want to rollback changes (using the    php artisan migrate:rollback    command): Reverse what's done in the up() method: Delete `order_item_id` column from `orders_logs` table    
        Schema::table('orders_logs', function($table) {
            $table->dropColumn('order_item_id');
        });
    }
};
