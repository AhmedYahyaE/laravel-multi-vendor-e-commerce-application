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
        Schema::table('orders', function($table) {
            $table->double('lat')->after('pincode')->nullable();
            $table->double('lng')->after('lat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function($table) {
            $table->dropColumn('vendor_id');
            $table->dropColumn('lat');
            $table->dropColumn('lng');
        });
    }
};
