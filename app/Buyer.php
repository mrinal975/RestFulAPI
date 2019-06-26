<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaction;
class Buyer extends Model
{
    public function transection(){
        return $this->hasMany(Transaction::class);
    }
}
