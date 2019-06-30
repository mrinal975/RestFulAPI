<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Category;
class CategoryTransformer extends TransformerAbstract
{

    public function transform(Category $category)
    {
        return [
            'Identifier' => (int)$category->id,
            'Name' => (string)$category->name,
            'Detail' => (string)$category->description,
            'Created_at' => $category->created_at,
            'Changed_at' => $category->updated_at,
            'Deleted_at' => isset($category->deleted_at)? (string) $category->deleted_at:null,
        ];
    }
    public static function originalAttribute($index){
        $attribute = [
            'identifier' => 'id',
            'Name' => 'name',
            'Detail' => 'description',
            'createdDate' => 'created_at',
            'lastChange' => 'updated_at',
            'deletedDate' => 'deleted_at',
        ];
        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}
