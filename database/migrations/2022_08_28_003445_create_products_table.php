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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->integer('section_id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('vendor_id'); // in case the product has been added by a some vendor (And in case the product has been added by another entity like a superadmin, admin or subadmin, the value will be 0 zero)
            $table->integer('admin_id'); // whether a vendor or a superadmin/admin/subadmin (from the `admins` table)
            $table->string('admin_type'); // can be vendor, superadmin, admin or subadmin
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_color');
            // $table->string('product_price');
            $table->float('product_price');
            // $table->string('product_discount');
            $table->float('product_discount');
            // $table->string('product_weight');
            $table->integer('product_weight');
            $table->string('product_image')->nullable();
            $table->string('product_video')->nullable();
            $table->string('group_code')->nullable(); // For Managing Product Colors (in front/products/detail.blade.php)    
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable(); // For SEO
            $table->string('meta_keywords')->nullable();  // For SEO
            $table->string('meta_description')->nullable(); // For SEO
            $table->enum('is_featured', ['No', 'Yes']); // "No" is the default value
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
        Schema::dropIfExists('products');
    }
};
