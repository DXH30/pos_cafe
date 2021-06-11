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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('inventory')->group(function() {
    Route::delete('stock_management/hapus', ['uses' => 'InventoryController@deleteStock', 'as' => 'delete-stock']);
    Route::prefix('track_order')->group(function() {
        Route::get('product', ['uses' => 'API\InventoryController@getStock', 'as' => 'api-get-stock']);
        Route::get('product/{id}', ['uses' => 'API\InventoryController@getStock', 'as' => 'api-get-stock']);
    });
});
