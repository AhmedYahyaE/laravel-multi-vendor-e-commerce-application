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
        Schema::table('vendors_business_details', function (Blueprint $table) {
            $table->string("license_image")->nullable()->after('business_license_number');
            $table->string("business_proof_image")->nullable()->after('license_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendors_business_details', function (Blueprint $table) {
            $table->dropColumn('license_image');
            $table->dropColumn('business_proof_image');
        });
    }
};
