<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Login\LoginPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
    * 
    * @OA\Post(
    *   path="/api/v1/auth/login",
    *   tags={"Authentication"},
    *   summary="Login using phone_number and password.",
    *   operationId="login",
    *
    *  @OA\Parameter(
    *      name="phone_number",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *   @OA\Parameter(
    *      name="password",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *   @OA\Response(
    *      response=200,
    *      description="Success"
    *   ),
    *   @OA\Response(
    *      response=401,
    *      description="Unauthorized"
    *   ),
    *   @OA\Response(
    *      response=404,
    *      description="API endpoint not found"
    *   ),
    *)
    **/
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
                'Error'=>'Invalid login credentials!'], 401);
        }

        /**
         * Return user information and access_token on a successfull login
         */

        $access_token = Auth::user()->createToken('accessToken')->accessToken;
        return response()->json(["Status"=>true,"User"=>Auth::user(),"Access_Token"=>$access_token]);
    }
}
