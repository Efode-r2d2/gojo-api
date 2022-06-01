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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($city)
    {
        // return details of a given city
        return response()->json(['Status'=>true, 'City'=>City::find($city)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($city)
    {
        // delete a given city
        City::find($city)->delete();
        return response()->json(['Status'=>true, 'Message'=>'City deleted successfully.']);
    }
}
