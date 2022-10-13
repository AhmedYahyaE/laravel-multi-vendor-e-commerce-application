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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('pincode');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->enum('confirm', ['No', 'Yes']); // added later    // "No" is the default value    // https://www.youtube.com/watch?v=ODwOtaa2GxU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=98
            $table->tinyInteger('status'); // active or not active (admins will approve the status of the vendor)

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
        Schema::dropIfExists('vendors');
    }
};
