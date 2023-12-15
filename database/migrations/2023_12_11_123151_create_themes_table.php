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
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('primary', 30);
            $table->string('secondary', 30);
            $table->string('tertiary', 30);
            $table->string('navigation', 30);
            $table->string('navigation_bar', 30);
            $table->string('success', 30);
            $table->string('warning', 30);
            $table->string('error', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('themes');
    }
};
