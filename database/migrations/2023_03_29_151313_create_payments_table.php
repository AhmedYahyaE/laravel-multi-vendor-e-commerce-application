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
        Schema::create('payments', function (Blueprint $table) {
            
            $table->id();

            $table->integer('order_id');
            $table->integer('user_id');
            $table->string('payment_id'); // comes from PayPal website    // 'string' data type because data may come as "alphanumeric" from PayPal website
            $table->string('payer_id');   // comes from PayPal website    // 'string' data type because data may come as "alphanumeric" from PayPal website
            $table->string('payer_email');
            $table->float('amount', 10, 2);
            $table->string('currency');
            $table->string('payment_status');

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
        Schema::dropIfExists('payments');
    }
};
