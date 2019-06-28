<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerCategoryController extends ApiController
{
    public function index($buyer)
    {
        $buyer = Buyer::find($buyer);
        return $categoryData = $buyer->transactions()->with('product.categories')
                                ->get()->collapse()->unique()->value();

        //collapse will create unique list with separel collation
        //value will remove empty
    }

}
