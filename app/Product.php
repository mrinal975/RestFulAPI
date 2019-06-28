<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Seller;
use App\Transaction;
use App\Buyer;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    const AVAILABLE_PRODUCT = 'available';
    const UNAVAILABLE_PRODUCT = 'unavailable';
    protected $fillable = [
        'name', 'description','quantity','status','image','seller_id'
    ];
    public function isAvailable(){
        return $this->status == Product::AVAILABLE_PRODUCT;
    }
    public function seller(){
        return $this->belongsToMany(Seller::class);
    }
    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
    public function category(){
        return $this->belongsToMany(Category::class);
    }
}
