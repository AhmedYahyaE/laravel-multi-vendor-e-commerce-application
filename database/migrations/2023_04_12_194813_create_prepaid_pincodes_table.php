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
        Schema::create('prepaid_pincodes', function (Blueprint $table) {
            // https://www.youtube.com/watch?v=djYkP9S30lE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=197
            $table->id();

            $table->string('pincode', 10);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prepaid_pincodes');
    }
};
