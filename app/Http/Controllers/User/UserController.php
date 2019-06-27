<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Faker\Generator as Faker;
use App\Product;
use App\User;
use Illuminate\Support\Str;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return $this->showAll($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:6',
        ];
        $this->validate($request,$rules);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['verified'] = User::UNVERIFIED_USER;
        $data['verification_token'] = Str::random(18);
        $data['admin'] = User::REGULAR_USER;

        $user = User::created($data);
        return $this->showOne($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return $this->showOne($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user =User::findOrFail($id);
        $rules = [
            'email'=>'required | unique : users, emial, '.$user->id,
            'password'=>'required|min:6',
            'admin'=>'in:'.User::ADMIN_USER.','.User::REGULAR_USER,
        ];

        //$this->validate($request,$rules);

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user>delete();
        return $this->showOne($user);
    }
}
