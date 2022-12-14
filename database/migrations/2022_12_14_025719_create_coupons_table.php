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
        Schema::create('coupons', function (Blueprint $table) {

            // https://www.youtube.com/watch?v=egx7-Hmb63Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=142
            $table->id();

            $table->integer('vendor_id'); // if the coupon is added by an admin, it'll be zero 0, but if it's added by a vendor, it'll be equal to the vendor id
            $table->string('coupon_option');
            $table->string('coupon_code');
            $table->text('categories');
            $table->text('users'); // empty string means coupon is for ALL users
            $table->string('coupon_type');
            $table->string('amount_type');
            $table->float('amount');
            $table->date('expiry_date'); // MySQL date format Y-M-D
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
        Schema::dropIfExists('coupons');
    }
};
