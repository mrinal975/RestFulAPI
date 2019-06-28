<?php

namespace App\Http\Controllers\Transaction;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class TransactionCategoryController extends ApiController
{
    public function index($transaction)
    {
        $transaction = Transaction::find($transaction);
        return $transaction->product->category;
    }

}
