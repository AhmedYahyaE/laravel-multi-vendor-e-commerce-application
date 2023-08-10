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
        Schema::create('banners', function (Blueprint $table) { 
            $table->id();

            $table->string('image'); // the FRONT banners image name
            $table->string('link');
            $table->string('title'); // 'title' HTML attribute (for SEO purposes)
            $table->string('alt'); // 'alt' <img> HTML attribute (for SEO purposes)
            $table->tinyInteger('status'); // 0 means inactive, 1 means active

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
        Schema::dropIfExists('banners');
    }
};
