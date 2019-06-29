<?php

namespace App;

use App\Transformers\TransactionTransformer;
use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Buyer;
use App\Seller;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    public $transformer = TransactionTransformer::class;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'quantity','buyer_id','product_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function buyer(){
        return $this->belongsToMany(Buyer::class);
    }
    public function seller(){
        return $this->belongsToMany(Seller::class);
    }
}
