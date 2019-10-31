<?php

use Illuminate\Http\Request;

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

Route::get('products', 'ProductController@index');
Route::get('products/{id}', 'ProductController@show');

/**
 * Only the owner can access these routes.
 */
Route::middleware([
    'auth:api',
    'owner',
])->group(function () {
    Route::post('products', 'ProductController@store');
    Route::put('products/{id}', 'ProductController@update');
    Route::delete('products/{id}', 'ProductController@destroy');
});

Route::prefix('auth')->group(function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    
    /**
     * Only the authenticated user can 
     * access these defined routes.
     */
    Route::middleware('auth:api')->group(function() {
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });
});