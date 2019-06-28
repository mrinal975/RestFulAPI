<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Category;
class CategoryController extends ApiController
{

    public function index()
    {
        return $this->showAll(Category::all());
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required'
        ];
        $this->validate($request,$rules);
        $newCategory = Category::create($request->all());
        return $this->showOne($newCategory,201);
    }
    public function show(Category $category)
    {
        return $this->showOne($category);
    }
    public function update(Request $request,Category $category)
    {
        $request->only('name','description');
        if (!$category->isClean()){
            return $this->errorResponse('You need to specify any different value',422);
        }
        $category->update($request->all());
        return $this->showOne($category);
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->errorResponse('successfully deleted ',200);
    }
}
