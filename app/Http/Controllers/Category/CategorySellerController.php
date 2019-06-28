<?php

namespace App\Http\Controllers\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CategorySellerController extends ApiController
{
    public function index(Category $category)
    {
        $data = $category->products()->with('seller')
                            ->get()
                            ->pluck('seller')
                            ->unique();

        return $this->showAll($data);
    }

}
