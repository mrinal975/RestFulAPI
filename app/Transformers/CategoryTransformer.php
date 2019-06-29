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
}
