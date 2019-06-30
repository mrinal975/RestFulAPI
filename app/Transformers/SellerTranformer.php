<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Seller;
class SellerTranformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Seller $seller)
    {
        return [
            'identifier' => (int)$seller->id,
            'name' => (string)$seller->name,
            'email' => (string)$seller->email,
            'isVerified' => (int)$seller->verified,
            'created_at' => $seller->created_at,
            'updated_at' => $seller->updated_at,
            'deleted_at' => isset($seller->deleted_at)? (string) $seller->deleted_at:null,
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
