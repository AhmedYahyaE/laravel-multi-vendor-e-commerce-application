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
        Schema::create('orders_products', function (Blueprint $table) {
            $table->id();

            $table->integer('order_id');   // Foreign Key to the `orders`   table
            $table->integer('user_id');    // Foreign Key to the `users`    table
            $table->integer('vendor_id');  // Foreign Key to the `vendors`  table    // if the item/product seller is a Vendor, the value is 1 one, and if the item/product seller is an Admin, the value is 0 zero
            $table->integer('admin_id');   // Foreign Key to the `admins`   table
            $table->integer('product_id'); // Foreign Key to the `products` table
            $table->string('product_code');
            $table->string('product_name');
            $table->string('product_color');
            $table->string('product_size');
            $table->float('product_price');
            $table->integer('product_qty');
            $table->string('item_status'); // Determined by 'vendor'-s ONLY, not 'admin'-s, in contrast to the `order_status` column in `orders` table which is determined by 'admin'-s ONLY, not 'vendor'-s    

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_products');
    }
};
