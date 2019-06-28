<?php

use Illuminate\Http\Request;

Route::resource('buyes','Buyer\BuyerController',['only'=>['index','show']]);
Route::resource('buyes.transaction','Buyer\BuyerTransactionController',['only'=>['index']]);
Route::resource('buyes.product','Buyer\BuyerProductController',['only'=>['index']]);
Route::resource('buyes.seller','Buyer\BuyerSellerController',['only'=>['index']]);
Route::resource('buyes.category','Buyer\BuyerCategoryController',['only'=>['index']]);

Route::resource('categories','Category\CategoryController',['except'=>['create','edit']]);
Route::resource('categories.product','Category\CategoryProductController',['only'=>['index']]);
Route::resource('categories.seller','Category\CategorySellerController',['only'=>['index']]);
Route::resource('categories.transaction','Category\CategoryTransactionController',['only'=>['index']]);
Route::resource('categories.transaction','Category\CategoryBuyerController',['only'=>['index']]);

Route::resource('products','Product\ProductController',['only'=>['index','show']]);

Route::resource('seller','Seller\SellerController',['only'=>['index','show']]);
Route::resource('seller.transaction','Seller\SellerTransactionController',['only'=>['index']]);
Route::resource('seller.category','Seller\SellerCategoryController',['only'=>['index']]);
Route::resource('seller.product','Seller\SellerProductController',['only'=>['store','create','update','edit']]);

Route::resource('transaction','Transaction\TransactionController',['only'=>['index','show']]);
Route::resource('transaction.categories','Transaction\TransactionCategoryController',['only'=>['index']]);
Route::resource('transaction.sellers','Transaction\TransactionSellerController',['only'=>['index']]);

Route::resource('user','User\UserController',['except'=>['create','edit']]);
