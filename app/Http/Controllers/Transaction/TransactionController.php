<?php

namespace App\Http\Controllers\Transaction;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class TransactionController extends ApiController
{

    public function index()
    {
        return $this->showAll(Transaction::all());
    }
    public function show(Transaction $transaction)
    {
        return $this->showOne($transaction);
    }
}
