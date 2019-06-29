<?php

namespace App\Transformers;
use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'identifier' => (int)$user->id,
            'name' => (string)$user->name,
            'email' => (string)$user->email,
            'isVerified' => (int)$user->verified,
            'isAdmin' => ($user->admin==='true'),
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'deleted_at' => isset($user->deleted_at)? (string) $user->deleted_at:null,
        ];
    }
}
