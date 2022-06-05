<?php

namespace App\Http\Controllers\Api\V1\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Property\PropertyTypePostRequest;
use App\Http\Requests\Property\PropertyTypePutRequest;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    /**
    * 
    * @OA\Get(
    *   path="/api/v1/property_types/",
    *   tags={"Manage Property Types"},
    *   summary="List available property types.",
    *   operationId="list-property-types",
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
    *)
    **/
    public function index()
    {
        //
        return response()->json(['Status'=>true, 'Property_Types'=>PropertyType::all()]);
    }

    /**
    * 
    * @OA\Post(
    *   path="/api/v1/property_types/",
    *   tags={"Manage Property Types"},
    *   summary="Create property type using property_type_name and property_type_code.",
    *   operationId="store-property-type",
    *
    *  @OA\Parameter(
    *      name="property_type_name",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="property_type_code",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *   @OA\Response(
    *      response=201,
    *      description="Success"
    *   ),
    *   @OA\Response(
    *      response=422,
    *      description="Unprocessable Content"
    *   ),
    *   @OA\Response(
    *      response=404,
    *      description="API endpoint not found"
    *   ),
    *)
    **/
    public function store(PropertyTypePostRequest $request)
    {
        /**
         * Create property type 
         */
        PropertyType::create([
            'property_type_name'=>$request->input('property_type_name'),
            'property_type_code'=>$request->input('property_type_code')
        ]);
        /**
         * return success response
         */
        return response()->json(['Status'=>true, 'Message'=>'Property created successfully']);
    }

    /**
    * 
    * @OA\Get(
    *   path="/api/v1/property_types/{id}",
    *   tags={"Manage Property Types"},
    *   summary="Get all the necessary info of a given property type.",
    *   operationId="show-property-type",
    *
    *  @OA\Parameter(
    *      name="id",
    *      in="path",
    *      required=true,
    *      @OA\Schema(
    *           type="integer",
    *           format="int64"
    *      )
    *   ),
    *   @OA\Response(
    *      response=200,
    *      description="Success"
    *   ),
    *   @OA\Response(
    *      response=422,
    *      description="Unprocessable Content"
    *   ),
    *   @OA\Response(
    *      response=404,
    *      description="API endpoint not found"
    *   ),
    *)
    **/
    public function show($id)
    {
        //
        return response()->json(['Status'=>true, 'Property_Type'=>PropertyType::find($id)]);
    }

    /**
    * 
    * @OA\Put(
    *   path="/api/v1/property_types/",
    *   tags={"Manage Property Types"},
    *   summary="Update property_type_name and property_type_code of a given property type.",
    *   operationId="update-property-type",
    *
    *  @OA\Parameter(
    *      name="id",
    *      in="path",
    *      required=true,
    *      @OA\Schema(
    *           type="integer",
    *           format="int64"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="property_type_name",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="property_type_code",
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
    *      description="Unprocessable Content"
    *   ),
    *   @OA\Response(
    *      response=404,
    *      description="API endpoint not found"
    *   ),
    *)
    **/
    public function update(PropertyTypePutRequest $request, $id)
    {
        //
        PropertyType::find($id)->update([
            'property_type_name'=>$request->input('property_type_name'),
            'property_type_code'=>$request->input('property_type_code')
        ]);
        return response()->json(['Status'=>true, 'Message'=>'Property type successfully updated.']);
    }

    /**
    * 
    * @OA\Delete(
    *   path="/api/v1/property_types/{id}",
    *   tags={"Manage Property Types"},
    *   summary="Delete a given property type.",
    *   operationId="delete-property-type",
    *
    *  @OA\Parameter(
    *      name="id",
    *      in="path",
    *      required=true,
    *      @OA\Schema(
    *           type="integer",
    *           format="int64"
    *      )
    *   ),
    *   @OA\Response(
    *      response=200,
    *      description="Success"
    *   ),
    *   @OA\Response(
    *      response=422,
    *      description="Unprocessable Content"
    *   ),
    *   @OA\Response(
    *      response=404,
    *      description="API endpoint not found"
    *   ),
    *)
    **/
    public function destroy($id)
    {
        //
        PropertyType::find($id)->delete();
        return response()->json(['Status'=>true, 'Message'=>'Property type deleted succefully.']);
    }
}
