<?php

namespace App\Http\Controllers\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CategoryBuyerController extends ApiController
{
    public function index(Category $category)
    {
        $data = $category->product()
                        ->with('transaction.buyer')
                        ->get()
                        ->collapse()
                        ->pluck('transaction.buyer')
                        ->unique('id')
                        ->values();
        return $this->showAll($data);
        //here i have used eager loading for fetching data from DB
    }

}
