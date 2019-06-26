<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Category;
use App\Product;
use App\Buyer;
Use App\Seller;
use App\Transaction;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    $verified = implode(" ",$faker->randomElements([User::VERIFIED_USER,User::UNVERIFIED_USER]));
    $admin = implode(" ",$faker->randomElements([User::ADMIN_USER,User::REGULAR_USER]));
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'remember_token' => Str::random(10),
        'verified' => $verified,
        'admin' => $admin,
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph(2),
    ];
});

$factory->define(Product::class, function (Faker $faker) {
    $status = implode(" ",$faker->randomElements([Product::AVAILABLE_PRODUCT,Product::UNAVAILABLE_PRODUCT]));
    $image = implode(" ",$faker->randomElements(['image/1.jpg','image/2.jpg','image/3.jpg']));
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph(2),
        'quantity' => $faker->numberBetween(1,15),
        'status' => $status,
        'image' => $image,
        'seller_id' => $faker->numberBetween(1,15),
    ];
});

$factory->define(Transaction::class, function (Faker $faker) {
    $product = Product::all()->random()->id;
    $buyer = User::all()->random()->id;
    return [
        'quantity' =>  $faker->numberBetween(1,3),
        'buyer_id' =>  $buyer,
        'product_id' =>  $product,
    ];
});
