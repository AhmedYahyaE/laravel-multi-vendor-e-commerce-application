<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('shipping_charges', function (Blueprint $table) {
            
            // We add those columns to apply the 'Advanced' Shipping Charges module instead of the 'Simple' one
            $table->float('0_500g')->after('country');
            $table->float('501g_1000g')->after('0_500g');
            $table->float('1001_2000g')->after('501g_1000g');
            $table->float('2001g_5000g')->after('1001_2000g');
            $table->float('above_5000g')->after('2001g_5000g');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipping_charges', function (Blueprint $table) {
            //
        });
    }
};
