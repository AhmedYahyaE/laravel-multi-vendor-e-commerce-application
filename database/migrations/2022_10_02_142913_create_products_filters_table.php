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
        Schema::create('products_filters', function (Blueprint $table) {
            $table->id();

            $table->string('cat_ids'); // all the different categories that the filter can be applied to
            $table->string('filter_name'); // e.g. 'fabric'
            $table->string('filter_column');
            $table->tinyInteger('status'); // 0 means inactive (disabled), 1 means active (enabled)

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
        Schema::dropIfExists('products_filters');
    }
};
