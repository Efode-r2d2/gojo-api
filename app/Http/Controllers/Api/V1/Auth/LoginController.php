<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Login\LoginPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(LoginPostRequest $request){
        /**
         * Extracting required credentials
         */
        $credentials = ['phone_number'=>$request->input('phone_number'),'password'=>$request->input('password')];
        /**
         * Attempting to login
         */
        if(!Auth::attempt($credentials)){
            return response()->json([
                'Status'=>false,
                'Error'=>'Invalid login credentials!']);
        }
        /**
         * Return user information and access_token on a successfull login
         */
        $access_token = Auth::user()->createToken('accessToken')->accessToken;
        return response()->json(["Status"=>true,"User"=>Auth::user(),"Access_Token"=>$access_token]);
    }
}
