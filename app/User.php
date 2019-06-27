<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';
    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';

    protected $table = 'users';

    protected $fillable = [
        'name', 'email',
        'password','verified',
        'verified_token','admin'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isVerified(){
        return $this->verified = User::VERIFIED_USER;
    }
    public function isAdmin(){
        return $this->admin = User::ADMIN_USER;
    }
    public function generateVerificationCode(){
        return str_random(40);
    }
    public function setNameAttribute($name){
        $this->attribute['name']=strtolower($name);
    }
    public function getNameAttribute($name){
        return ucwords($name);
    }
    public function setEmailAttribute($email){
        $this->attribute['email']=strtolower($email);
    }
    public function getEmailAttribute($email){
        return ucwords($email);
    }
}
