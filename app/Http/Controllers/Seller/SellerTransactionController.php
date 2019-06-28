<?php

namespace App\Http\Controllers\Seller;

use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class SellerTransactionController extends ApiController
{
    public function index(Seller $seller)
    {
        $data = $seller->products()
                ->with('transaction')
                ->get()
                ->pluck('transaction')
                ->collapse()
                ->unique('id')
                ->values();
        return $this->showAll($data);
    }
}
