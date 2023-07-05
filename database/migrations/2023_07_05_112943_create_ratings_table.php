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
        Schema::create('ratings', function (Blueprint $table) {
            // https://www.youtube.com/watch?v=xYDsEiQBXzk&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=225
            $table->id();

            $table->integer('user_id');
            $table->integer('product_id');
            $table->text('review');
            $table->integer('rating');
            $table->tinyInteger('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
