<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Register\StorePostRequest;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Register a user with 
     * name, phone_phone number and password as required parameters and 
     * email as optional parameter
     */
    public function register(StorePostRequest $request){

        User::create([
            'name'=>$request->input('name'),
            'phone_number'=>$request->input('phone_number'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password'))
        ]);
        return response()->json(['Status'=>true,"Message"=>"User successfully registered."]);
    }

}
