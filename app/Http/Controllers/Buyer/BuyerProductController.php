<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerProductController extends ApiController
{
    public function index($buyer)
    {
        $buyer = Buyer::find($buyer);
        $data = $buyer->transactions()->with('product')->get()->pluck('product');

        return $this->showAll($data);
    }

    public function destroy(Buyer $buyer)
    {
        //
    }
}
