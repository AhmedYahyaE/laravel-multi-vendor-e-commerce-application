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
        Schema::create('products_attributes', function (Blueprint $table) {
            $table->id();

            $table->integer('product_id');
            $table->string('size');
            $table->float('price');
            $table->integer('stock');
            $table->string('sku'); // Stock Keeping Unit (example: CW21001)    // SKU is similar to Product Code then - hyphen then the initial of the product size (e.g. 'RC001-S')
            $table->tinyInteger('status'); // 0 means inactive/disabled, 1 means active/enabled

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
        Schema::dropIfExists('products_attributes');
    }
};
