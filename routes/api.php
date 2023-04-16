<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// https://www.youtube.com/playlist?list=PLLUtELdNs2ZaPSOuYoosmSj5TUuXjl_uu
// For Shiprocket API Integration (N.B. you should create a new 'API' folder and a new 'APIController.php' file for all your integrated APIs. N.B. while working with APIs, you'll use Laravel "api.php" file instead of "web.php" file, and all of your API endpoints/routes/links in "api.php" file will automatically be prefixed with/have the "api" word like this example:     www.example.com/api/orders/create     ), check     https://www.youtube.com/watch?v=mcSoGDSrdsU&list=PLLUtELdNs2ZaPSOuYoosmSj5TUuXjl_uu&index=2     (For the complete API integration Playlist, check https://www.youtube.com/playlist?list=PLLUtELdNs2ZaPSOuYoosmSj5TUuXjl_uu)
// Note: When working with APIs (like working in APIController.php), everything returned must be in JSON format.
// Note: To access (open) the API routes (endpoints) (in api.php), you must prefix all your routes with     '/api/'     e.g.     http://127.0.0.1:8000/api/posts     , but you don't have to write (prefix) your routes themselves in the api.php file with the '/api/' prefix (i.e. you don't need to write it with '/api/' and just write it like this: Route::get('/posts', function() {   . Check 26:22 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
// Shiprocket API Documentation: https://apidocs.shiprocket.in/


// Route::namespace('API')->group(function() { // Route Groups: https://laravel.com/docs/9.x/routing#route-groups
Route::namespace('App\Http\Controllers\API')->group(function() { // Route Groups: https://laravel.com/docs/9.x/routing#route-groups
    // Push our 'ecom9' website orders (from our `orders` database table) to Shiprocket    // https://www.youtube.com/watch?v=mcSoGDSrdsU&list=PLLUtELdNs2ZaPSOuYoosmSj5TUuXjl_uu&index=2
    Route::get('push-order/{id}', 'APIController@pushOrder'); // This route/URL/link is: http://127.0.0.1:8000/api/push-order/3    // Route Parameters: Required Parameters: https://laravel.com/docs/9.x/routing#required-parameters

    // 
});