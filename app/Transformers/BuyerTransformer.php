<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Buyer;
class BuyerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Buyer $buyer)
    {
        return [
            'identifier' => (int)$buyer->id,
            'name' => (string)$buyer->name,
            'email' => (string)$buyer->email,
            'isVerified' => (int)$buyer->verified,
            'created_at' => $buyer->created_at,
            'updated_at' => $buyer->updated_at,
            'deleted_at' => isset($buyer->deleted_at)? (string) $buyer->deleted_at:null,
        ];
    }
    public static function originalAttribute($index){
        $attribute = [
            'identifier' => 'id',
            'name' => 'name',
            'email' => 'email',
            'isVerified' => 'verified',
            'isAdmin' => 'admin',
            'createdDate' => 'created_at',
            'lastChange' => 'updated_at',
            'deletedDate' => 'deleted_at',
        ];
        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}
