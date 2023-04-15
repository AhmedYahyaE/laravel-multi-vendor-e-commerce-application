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
        Schema::table('vendors', function (Blueprint $table) {
            // Add `commission` percentage column to `vendors` table    // https://www.youtube.com/watch?v=e8Gj_8MPFSg&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=199
            $table->float('commission')->after('confirm'); // `commission` is a percentage
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            // Reverse the operation in case that we want to rollback changes (using the    php artisan migrate:rollback    command): Reverse what's done in the up() method: Delete the `commission` column from `vendors` table    // https://www.youtube.com/watch?v=e8Gj_8MPFSg&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=199
            $table->dropColumn('commission');
        });
    }
};
