<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\HttpResponses;
use App\Http\Requests\storeUserRequest;
use App\Http\Requests\loginUserRequest;
use App\Models\User;

class AdminController1 extends Controller
{

     
    public function login(loginUserRequest $request){

        $request->validated($request->all());
        if(!Auth::attempt($request->only('email','password'))){
            return $this->error('','credential do not match',401);
        } 
         $user=User::where('email',$request->email)->first();

        return $this->success([
            'user'=>$user,
            'token'=>$user->createToken('API Token of'.$user->name)->plainTextToken 
        ]);
         
    }

    

    public function register(storeUserRequest $request){

        $request->validated($request->all());
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>Hash::make($request->password),
             
        ]);
        return $this->success([
            'user'=>$user,
            'token'=>$user->createToken('API Token of'.$user->name)->plainTextToken
        ]);
    }

    public function logout(){
        Auth::User()->currentAccessToken()->delete();
        return $this->success([

            'message'=>'you are successfully been logged out and token has been deleted'
        ]);

    }


function getAllUser(){
    $users=User::all();

    return responce()->json($user);
}
}
