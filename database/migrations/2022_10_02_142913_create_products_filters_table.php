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

            $table->string('cat_ids'); // all the different categories that the filter can be applied to    // Important Note: DON'T separate the `cat_ids` with anything other than commas (i.e. the correct way is like '3,9,7,5,4') in order for the getCategoryName() method in Category.php model to work properly
            $table->string('filter_name'); // e.g. 'fabric' for the 'Cloting' category
            $table->string('filter_column'); // must be all in small letters, and if there's more than one word, use underscores _ instead of spaces (because later on, this will be used to be a new column in `products` table (filter column))
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
