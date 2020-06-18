<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class customauthcontroller extends Controller
{
    public function login(Request $request){
        
        $cre = $request->only('email','password');

        if(! $token=JWTAuth::attempt($cre)){
            return ['error'=>'Invalid credentials'];
        }

        return ['token'=>$token];

    }

    public function reg(Request $request){
        
        //create
       $user = new User;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);
       $user->save();
       
        //response
        return ['success' => 'user created!', 'user'=> $user];
    }
}
