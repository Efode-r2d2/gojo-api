<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Register\RegisterPostRequest;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Register user
     */
    public function register(RegisterPostRequest $request){

        User::create([
            'name'=>$request->input('name'),
            'phone_number'=>$request->input('phone_number'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password'))
        ]);
        return response()->json(['Status'=>true,"Message"=>"User successfully registered."]);
    }

}
