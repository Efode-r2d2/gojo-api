<?php

namespace App\Http\Controllers\Api\V1\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use App\Http\Resources\PropertyResource;
use App\Http\Requests\Property\PropertyPostRequest;
use App\Http\Requests\Property\PropertyPutRequest;

class PropertyController extends Controller
{
    /**
    * 
    * @OA\Get(
    *   path="/api/v1/properties/",
    *   tags={"Manage Properties"},
    *   summary="List available properties.",
    *   operationId="list-properties",
    *
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
    *   security={
    *         {"bearerAuth": {}}
    *   }
    *)
    **/
    public function index()
    {
        return response()->json(["Status"=>true, "Properties"=>PropertyResource::collection(Property::all())]);
    }

    /**
    * 
    * @OA\Post(
    *   path="/api/v1/properties/",
    *   tags={"Manage Properties"},
    *   summary="Create new property.",
    *   operationId="create-property",
    *
    *  @OA\Parameter(
    *      name="property_title",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="property_description",
    *      in="query",
    *      required=false,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="property_type_id",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="integer",
    *           format="int64"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="price",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="number",
    *           format="currency"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="latitude",
    *      in="query",
    *      required=false,
    *      @OA\Schema(
    *           type="decimal"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="longitude",
    *      in="query",
    *      required=false,
    *      @OA\Schema(
    *           type="decimal"
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
    *   security={
    *         {"bearerAuth": {}}
    *   }
    *)
    **/
    public function store(PropertyPostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
