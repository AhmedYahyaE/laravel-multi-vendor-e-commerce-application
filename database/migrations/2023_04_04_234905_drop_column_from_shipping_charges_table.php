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
            // https://www.youtube.com/watch?v=aBu-PsYERIY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=191
            $table->dropColumn('rate'); // We drop the `rate` column in order to apply the 'Advanced' Shipping Charges module instead of the 'Simple' one
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipping_charges', function (Blueprint $table) {
            // https://www.youtube.com/watch?v=aBu-PsYERIY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=191
        });
    }
};
