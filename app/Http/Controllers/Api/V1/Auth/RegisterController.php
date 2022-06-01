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
     * * @OAS\SecurityScheme(
     *  securityScheme="bearerAuth",
     *  type="http",
     *  scheme="bearer"
     *  ) 
     * 
     *
 *      @OAS\Get(
 *
 *   security={{"bearerAuth":{}}})
 * 
     * 
     * @OA\Post(
     ** path="/api/v1/auth/register",
     *   tags={"Authentication"},
     *   summary="Register user using name, phone_number and password as required parameters and email as an optional paramter.",
     *   operationId="register",
     *
     *  @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *       name="phone_number",
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
     *      response=422,
     *      description="Unprocessable content"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="API endpoint not found"
     *   ),
     *)
     **/
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
