<?php
use App\User;
use App\Category;
use App\Product;
use App\Buyer;
Use App\Seller;
use App\Transaction;
use App\Category_product;
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

        $userQuantity = 100;
        $categoryQuantity = 100;
        $productQuantity = 100;
        $transactionQuantity = 100;
        $CategoryProductQuantity = 100;

        User::flushEventListeners();
        Category::flushEventListeners();
        Product::flushEventListeners();
        Transaction::flushEventListeners();
        Category_product::flushEventListeners();

        //flushEventListeners this will prevent to trigger event listener at appserviceprovider file

        factory(User::class,$userQuantity)->create();
        factory(Category::class,$categoryQuantity)->create();
        factory(Product::class,$productQuantity)->create();
        factory(Transaction::class,$transactionQuantity)->create();
        factory(Category_product::class,$CategoryProductQuantity)->create();
    }
}
