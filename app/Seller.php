<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Seller extends Model
{
    protected $table = 'users';

    public function products(){
        return $this->hasMany(Product::class);
    }
}
