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

Route::resource('buyes','Buyer\BuyerController',['only'=>['index','show']]);

Route::resource('categories','Category\CategoryController',['except'=>['create','edit']]);

Route::resource('products','Product\ProductController',['only'=>['index','show']]);

Route::resource('seller','Seller\SellerController',['only'=>['index','show']]);

Route::resource('transaction','Transaction\TransactionController',['only'=>['index','show']]);

Route::resource('user','User\UserController',['except'=>['create','edit']]);
