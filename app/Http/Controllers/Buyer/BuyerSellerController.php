<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerSellerController extends ApiController
{
    public function index($buyer)
    {
        $buyer = Buyer::find($buyer);
        $data = $buyer->transactions()->with('product.seller')->get()
            ->pluck('product.seller')->unique('id');
        return $this->showAll($data);
    }
}
