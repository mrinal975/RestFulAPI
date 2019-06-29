<?php

namespace App;
use App\Product;
use App\Transformers\CategoryTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    public $transformer = CategoryTransformer::class;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'description'
    ];
    public function products(){
        return $this->belongsToMany('App\Product', 'category_products', 'product_id', 'category_id');
        //return $this->belongsToMany(Product::class);
    }
}
