<?php

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

Route::get('/', ['uses' => 'LandingController', 'as' => 'landing']);

Route::prefix('auth')->group(function() {
    Route::match(['GET', 'POST'], 'login', ['uses' => 'UserController@login', 'as' => 'login']);
    Route::match(['GET', 'POST'], 'register', ['uses' => 'UserController@register', 'as' => 'register']);
    Route::match(['GET', 'POST'], 'forgot_password', ['uses' => 'UserController@forgot_password', 'as' => 'forgot-password']);
    Route::match(['GET', 'POST'], 'logout', ['uses' => 'UserController@logout', 'as' => 'logout']);
});

Route::middleware('auth')->group(function() {
    Route::get('dashboard', ['uses' => 'DashboardController@page', 'as' => 'dashboard']);
    Route::get('profile', ['uses' => 'DashboardController@profile', 'as' => 'profile']);
    Route::prefix('inventory')->group(function() {
        Route::get('stock_management', ['uses' => 'InventoryController@stock_management', 'as' => 'stock-management']);
        Route::post('stock_management', ['uses' => 'InventoryController@postStock', 'as' => 'post-stock']);
        Route::post('stock_management/edit/{id}', ['uses' => 'InventoryController@editStock', 'as' => 'edit-stock']);
        Route::get('track_order', ['uses' => 'InventoryController@track_order', 'as' => 'track-order']);
        Route::post('track_order', ['uses' => 'InventoryController@postOrder', 'as' => 'post-order']);
        Route::get('requests', ['uses' => 'InventoryController@requests', 'as' => 'requests']);
        Route::get('order/d/{id}', ['uses' => 'InventoryController@order_done', 'as' => 'order-done']);
        Route::get('order/p/{id}', ['uses' => 'InventoryController@order_print', 'as' => 'order-print']);
    });
});
