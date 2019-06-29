<?php

namespace App;

use App\Transformers\BuyerTransformer;
use Illuminate\Database\Eloquent\Model;
use App\Transaction;
use App\Scopes\BuyerScope;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buyer extends Model
{
    use SoftDeletes;
    protected $table = 'users';
    protected $dates = ['deleted_at'];
    public $transformer = BuyerTransformer::class;
//    protected static function boot(){
//        parent::boot();
//        static ::addGlobalScope(new BuyerScope);
//    }

    public function transactions(){
         return $this->hasMany(Transaction::class);
    }
}
