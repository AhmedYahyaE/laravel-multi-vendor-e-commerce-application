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
        Schema::table('users', function (Blueprint $table) {
            // Here, we add some additional columns to the default Laravel's `users` table
            $table->string('address')->after('name')->nullable();
            $table->string('city')->after('address')->nullable();
            $table->string('state')->after('city')->nullable();
            $table->string('country')->after('state')->nullable();
            $table->string('pincode')->after('country')->nullable();
            $table->string('mobile')->after('pincode')->nullable();
            $table->tinyInteger('status')->after('password'); // 0 is inactive/disabled/deactivated, 1 is active/enabled/activated
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // This gets executed in case the we run the 'rollback' command to REVERSE the migration up() method
            // Reverse what the up() method has done, and in this case, the up() method adds columns, so here in down() method, we reverse the operation, so we delete (drop) the columns (in case a 'rollback' command is run)
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('country');
            $table->dropColumn('pincode');
            $table->dropColumn('mobile');
            $table->dropColumn('status');
        });
    }
};
