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
            'Changed_at' => $transaction->updated_at,
            'Deleted_at' => isset($transaction->deleted_at)? (string) $transaction->deleted_at:null,
        ];
    }
}
