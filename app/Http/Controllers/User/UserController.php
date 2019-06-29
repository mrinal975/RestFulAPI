<?php

namespace App\Http\Controllers\User;

use App\Mail\UserCreated;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Faker\Generator as Faker;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class UserController extends ApiController
{
    public function index()
    {
        $user = User::all();
        return $this->showAll($user);
    }


    public function create()
    {
        
    }

    //there is a problem while creating an user verification_token field always getting empty
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:6',
        ];
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['verified'] = User::UNVERIFIED_USER;
        $data['verification_token'] ='baba lOknath';
        $data['admin'] = User::REGULAR_USER;
        $data['created_at'] = User::REGULAR_USER;


        $user = User::create($data);
        return $this->showOne($user);
    }


    public function show(User $user)
    {
        return $this->showOne($user);
    }


    public function edit(User $user)
    {
        //
    }


    public function update(Request $request, User $user)
    {
        $rules = [
            'email'=>'required',
            'password'=>'required|min:6',
            'admin'=>'required',
        ];

        //$this->validate($request,$rules);
        if ($user->isDirty('email')){
            $user->email=$request->email;
        }
        if ($request->has('name')){
            $user->name=$request->name;
        }
        if ($request->has('email') && $request->email != $user->email ){
            $user->verified=User::UNVERIFIED_USER;
            $user->verification_token=Str::random(18);
            $user->email = $request->email;
        }
        if ($request->has('password')){
            $user->password= bcrypt($request->password);
        }
        if ($request->has('admin')){
            if (!$user->isVerified()){
                return response()->json(['error'=>'Only Verified user can modify the admin field','code'=>409],409);
            }
            $user->admin= $request->admin;
        }
        $user->save();
        return $this->showOne($user);
    }

    public function destroy(User $user)
    {
        $user>delete();
        return $this->showOne($user);
    }
    public function verify($token)
    {
        $user = User::where('verification_token',$token)->first();
        $user->verified = User::VERIFIED_USER;
        $user->verification_token = null;
        $user->save();
        return $this->showMessage('This account has benn verified successfully');
    }
    public function resend(User $user)
    {
        if ($user->isVerified()){
            return $this->errorResponse('This user already verified',409);
        }
        retry(5,function () use ($user){
            Mail::to($user)->send(new UserCreated($user));
        },100);

        return $this->showMessage('The verification email has been resend');
    }
}
