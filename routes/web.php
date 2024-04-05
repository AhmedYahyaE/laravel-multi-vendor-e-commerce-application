<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

if (env('APP_ENV' == "local")) {
    require __DIR__ . "/web_local.php";
} elseif (env('APP_ENV') == "uat") {
    require __DIR__ . "/web_uat.php";
}