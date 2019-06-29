<?php

namespace App;

use App\Transformers\UserTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    public $transformer = UserTransformer::class;
    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';
    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';

    protected $table = 'users';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verified_token',
        'admin'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isVerified(){
        return $this->verified = User::VERIFIED_USER;
    }
    public function isAdmin(){
        return $this->admin = User::ADMIN_USER;
    }
    public static function generateVerificationCode(){
        return Str::random(3);
    }
}
