<?php

namespace App;

use App\Transformers\SellerTranformer;
use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Scopes\SellerScope;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends Model
{
    use SoftDeletes;
    public $transformer = SellerTranformer::class;
    protected $table = 'users';
    protected $dates = ['deleted_at'];
//    protected static function boot(){
//        parent::boot();
//        static ::addGlobalScope(new SellerScope);
//    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}
