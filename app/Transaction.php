<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Buyer;
class Transaction extends Model
{
    protected $fillable = [
        'quantity','buyer_id','product_id'
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
    public function buyer(){
        return $this->belongsToMany(Buyer::class);
    }
}
