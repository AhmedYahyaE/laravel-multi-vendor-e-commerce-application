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
        Schema::table('users', function (Blueprint $table) {
            // Add `api_token` column to `users` table. Usage: Whenever a new user registers a new account using our Registration API Endpoint, we'll generate an Access Token for them to use and send with all their subsequent HTTP Requests (and will store it in the `api_token` column in `users` table). Note: Whenever the user logs in, we'll generate a new Access Token (that acts the same as a browser Session (i.e. Both Session and Access Token are sent from the client to the server with EVERY HTTP Request), except the fact that there's no browser Session here!) that will replace the old one in the `api_token` column in `users` table. This token will be valid only till the user logs out and then expires (by deleting it from the `api_token` column in the `users` database table when the user logs out).    // https://www.youtube.com/watch?v=9sVIw6iwywU&list=PLLUtELdNs2Za4up75dHyaSaMTp0VemrfE&index=14
            // $table->string('api_token', 255)->after('remember_token')->nullable();
            // $table->string('access_token', 255)->after('remember_token')->nullable();
            $table->text('access_token')->after('remember_token')->nullable(); // https://www.youtube.com/watch?v=Uodk4fNSnrY&list=PLLUtELdNs2Za4up75dHyaSaMTp0VemrfE&index=17
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Reverse the operation in case that we want to rollback changes (using the    php artisan migrate:rollback    command): Reverse what's done in the up() method: Delete the `api_token` column from `users` table    // https://www.youtube.com/watch?v=_94aEnDcJoU&list=PLLUtELdNs2ZaPSOuYoosmSj5TUuXjl_uu&index=3
            // $table->dropColumn('api_token');
            $table->dropColumn('access_token');
        });
    }
};
