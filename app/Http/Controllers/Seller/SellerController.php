<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Seller;
class SellerController extends ApiController
{
    public function index()
    {
        $seller = Seller::has('products')->get();
        return $this->showAll($seller);
        //return response()->json(['data'=>$seller],200);
    }
    public function show(Seller $seller)
    {
        return $this->showOne($seller);
    }

    public function destroy($id)
    {

    }
}
