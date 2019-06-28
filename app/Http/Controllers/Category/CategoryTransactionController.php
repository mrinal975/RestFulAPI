<?php

namespace App\Http\Controllers\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CategoryTransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
         $data = $category->products()
                            ->whereHas('transaction')
                            ->with('transaction')
                            ->get()
                            ->pluck('transaction')
                            ->unique()
                            ->collapse();
         return $this->showAll($data);
        //Here im using eager loading with keyword
    }

}
