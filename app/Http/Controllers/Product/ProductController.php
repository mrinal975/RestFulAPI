<?php

namespace App\Http\Controllers\Product;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
class ProductController extends ApiController
{
    public function index()
    {
        return $this->showAll(Product::all());
    }
    public function show(Product $product)
    {
        return $this->showOne($product);
    }

    public function destroy(Product $product)
    {

    }
}
