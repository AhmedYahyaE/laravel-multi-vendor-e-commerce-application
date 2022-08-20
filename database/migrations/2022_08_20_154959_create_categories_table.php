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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->integer('parent_id'); // it will be zero 0 in case there's no parent category
            $table->integer('section_id');
            $table->string('category_name');
            $table->string('category_image');
            $table->float('category_discount');
            $table->text('description');
            $table->string('url'); // Admin can add a SEO-friendly category URL from the Admin Panel
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords');
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
        Schema::dropIfExists('categories');
    }
};
