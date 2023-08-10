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
        // My code
        // Add the `is_bestseller` column after `is_featured` column to the already existing `products` database table
        Schema::table('products', function($table) {
            // Note: Only 'superadmin' can mark a product as 'bestseller', but 'vendor' can't
            $table->enum('is_bestseller', ['No', 'Yes'])->after('is_featured'); // add the `is_bestseller` column AFTER the `is_featured` column    // 'No' will be picked as the 'DEFAULT' value    // Column Modifiers: https://laravel.com/docs/9.x/migrations#column-modifiers
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        // this gets executed in case the we run the 'rollback' command
        Schema::table('products', function($table) {
            $table->dropColumn('is_bestseller'); // Reverse the up() method procedure, and in this case, the up() method adds a column, so here in down() method, we reverse the operation, so we delete (drop) the column (in case a 'rollback' command is run)
        });
    }
};
