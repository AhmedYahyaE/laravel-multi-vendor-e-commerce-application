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

            
            $table->id();

            $table->integer('vendor_id'); // if the coupon is added by an admin, it'll be zero 0, but if it's added by a vendor, it'll be equal to the vendor id
            $table->string('coupon_option');
            $table->string('coupon_code');
            $table->text('categories');
            $table->text('brands')->nullable();
            $table->text('users'); // empty string means coupon is for ALL users
            $table->string('coupon_type'); // 'Multiple' or 'Single': 'Multiple' means that coupon can be availed/redeemed by users 'multiple' times, and 'Single' means coupon can be availed/redeemed by users only 'one' 'single' time
            $table->string('amount_type'); // 'Percentage' or 'Fixed': The discount is either a 'percentage' (i.e. 20%), or a 'fixed' amount (i.e. 20 USD)
            $table->float('amount');
            $table->date('expiry_date'); // MySQL date format Y-M-D    // Coupon expiry date
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
