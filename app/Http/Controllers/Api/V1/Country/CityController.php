<?php

namespace App\Http\Controllers\Api\V1\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Country\CityPostRequest;
use App\Http\Requests\Country\CityPutRequest;
use App\Models\City;

class CityController extends Controller
{
    /**
    * 
    * @OA\Get(
    *   path="/api/v1/regions/{region-id}/cities",
    *   tags={"Manage Cities"},
    *   summary="List cities under a given region.",
    *   operationId="list-cities",
    *
    *  @OA\Parameter(
    *      description="Country ID in the database",
    *      name="region-id",
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
    *      response=401,
    *      description="Unauthorized"
    *   ),
    *   @OA\Response(
    *      response=404,
    *      description="API endpoint not found"
    *   ),
    *)
    **/
    public function index($region)
    {
        // return all cities belongs to a given region
        $cities = City::where('region', '=', $region)->get();
        return response()->json(['Status'=>true,'Cities'=>$cities]);
    }

    /**
    * 
    * @OA\Post(
    *   path="/api/v1/regions/{region-id}/cities",
    *   tags={"Manage Cities"},
    *   summary="Create a city using city_name and city code.",
    *   operationId="store-city",
    *
    *  @OA\Parameter(
    *      description="ID of the region.",
    *      name="region-id",
    *      in="path",
    *      required=true,
    *      @OA\Schema(
    *           type="integer",
    *           format="int64"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="city_name",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="city_code",
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
    public function store(CityPostRequest $request, $region)
    {   
        // create city
        City::create([
            'city_name'=>$request->input('city_name'),
            'city_code'=>$request->input('city_code'),
            'region'=>$region
        ]);
        // return success response
        return response()->json(['Status'=>true, "Message"=>"City registerd successfully"]);
    }

    /**
    * 
    * @OA\Get(
    *   path="/api/v1/cities/{city-id}",
    *   tags={"Manage Cities"},
    *   summary="Get all the necessary info of a given city.",
    *   operationId="show-city",
    *
    *  @OA\Parameter(
    *      name="city-id",
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
    public function show($city)
    {
        // return details of a given city
        return response()->json(['Status'=>true, 'City'=>City::find($city)]);
    }

    /**
    * 
    * @OA\Put(
    *   path="/api/v1/cities/{city-id}",
    *   tags={"Manage Cities"},
    *   summary="Update city_name and city_code of a given city.",
    *   operationId="update-city",
    *
    *  @OA\Parameter(
    *      name="city-id",
    *      in="path",
    *      required=true,
    *      @OA\Schema(
    *           type="integer",
    *           format="int64"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="city_name",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="city_code",
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
    public function update(CityPutRequest $request, $city)
    {
        //update city info
        City::find($city)->update([
            'city_name'=>$request->input('city_name'),
            'city_code'=>$request->input('city_code')
        ]);
        //return success response
        return response()->json(['Status'=>true, 'Message'=>'City information updated successfully.']);
    }

    /**
    * 
    * @OA\Delete(
    *   path="/api/v1/cities/{city-id}",
    *   tags={"Manage Cities"},
    *   summary="Delete a given city.",
    *   operationId="delete-city",
    *
    *  @OA\Parameter(
    *      name="city-id",
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
    public function destroy($city)
    {
        // delete a given city
        City::find($city)->delete();
        return response()->json(['Status'=>true, 'Message'=>'City deleted successfully.']);
    }
}
