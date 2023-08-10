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
        // Add the `type` column after `image` column to the already existing `banners` database table
        Schema::table('banners', function($table) {
            $table->string('type')->after('image')->nullable(); // add the `type` column AFTER the `image` column    // Column Modifiers: https://laravel.com/docs/9.x/migrations#column-modifiers
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        // this gets executed in case the we run the 'rollback' command to REVERSE the migration up() method
        Schema::table('banners', function($table) {
            $table->dropColumn('type'); // Reverse the up() method procedure, and in this case, the up() method adds a column, so here in down() method, we reverse the operation, so we delete (drop) the column (in case a 'rollback' command is run)
        });
    }
};
