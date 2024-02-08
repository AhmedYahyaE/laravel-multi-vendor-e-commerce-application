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
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendors_business_details', function (Blueprint $table) {
            $table->dropColumn('address_proof');
            $table->dropColumn('address_proof_image');
            $table->dropColumn('gst_number');
            $table->dropColumn('pan_number');
        });
    }
};
