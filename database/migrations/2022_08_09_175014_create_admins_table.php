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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('type'); // superadmin, admin, subadmin, or vendor
            $table->integer('vendor_id'); // only if the    $table->string('type')    is 'vendor', then 'vendor_id' is one 1, otherwise, all the other 'type'-s, `vendor_id` will be zero 0
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->enum('confirm', ['No', 'Yes']); // added later    // "No" is the default value    
            $table->tinyInteger('status');
    
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
        Schema::dropIfExists('admins');
    }
};
