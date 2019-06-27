<?php
use App\User;
use App\Category;
use App\Product;
use App\Buyer;
Use App\Seller;
use App\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::truncate();
//        Category::truncate();
//        Product::truncate();
//        Transaction::truncate();

        $userQuantity = 700;
        $categoryQuantity = 300;
        $productQuantity = 2000;
        $transactionQuantity = 2000;

        factory(User::class,$userQuantity)->create();
        factory(Category::class,$categoryQuantity)->create();
        factory(Product::class,$productQuantity)->create();
        factory(Transaction::class,$transactionQuantity)->create();
    }
}
