<?php

namespace App\Transformers;

use App\Transaction;
use League\Fractal\TransformerAbstract;

class TransactionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Transaction $transaction)
    {
        return [
            'Identifier' => (int)$transaction->id,
            'Quantity' => (int)$transaction->quantity,
            'Buyer_id' => (int)$transaction->buyer_id,
            'Product_id' => (int)$transaction->product_id,
            'Created_at' => $transaction->created_at,
            'lastChange' => $transaction->updated_at,
            'deletedDate' => isset($transaction->deleted_at)? (string) $transaction->deleted_at:null,
        ];
    }
    public static function originalAttribute($index){
        $attribute = [
            'identifier' => 'id',
            'Quantity' => 'quantity',
            'Buyer_id' => 'buyer_id',
            'Product_id' => 'product_id',
            'createdDate' => 'created_at',
            'lastChange' => 'updated_at',
            'deletedDate' => 'deleted_at',
        ];
        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}
