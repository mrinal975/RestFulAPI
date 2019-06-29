<?php

namespace App\Transformers;

use App\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            'Identifier' => (int)$product->id,
            'Name' => (string)$product->name,
            'Detail' => (string)$product->description,
            'Quantity' => (int)$product->quantity,
            'Status' => (string)$product->status,
            'Picture' => url("image/{$product->image}"),
            'Seller' => (int)$product->seller_id,
            'Created_at' => $product->created_at,
            'Changed_at' => $product->updated_at,
            'Deleted_at' => isset($product->deleted_at)? (string) $product->deleted_at:null,
        ];
    }
}
