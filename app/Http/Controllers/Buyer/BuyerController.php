<?php

namespace App\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Buyer;
use App\Transaction;

class BuyerController extends ApiController
{
    public function index()
    {
        $buyer = Buyer::has('transactions')->get();
        return $this->showAll($buyer);
    }

    public function show(Buyer $buyer)
    {
        return $this->showOne($buyer);
    }

}
