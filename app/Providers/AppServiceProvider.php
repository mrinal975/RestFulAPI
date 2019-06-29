<?php

namespace App\Providers;

use App\Mail\UserCreated;
use App\Mail\UserMailChanged;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Mail;
class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }
 //if the desire event fail we can use corn job retry
    //first parameter of this is how many time should retry second one is  the job and
    // last or final one is middle time of retry
    public function boot()
    {
        Schema::defaultStringLength(191);

        User::updated(function ($user){
           if ($user->email){
               retry(5,function ()use ($user){
                   Mail::to($user)->send(new UserMailChanged($user));
               },100);

           }
        });
        User::created(function ($user){
            retry(5,function ()use ($user){
                Mail::to($user)->send(new UserCreated($user));
            },100);
        });
    }
}
