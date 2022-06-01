<?php

namespace App\Http\Controllers\Api\V1\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Country\RegionPostRequest;
use App\Http\Requests\Country\RegionPutRequest;
use App\Models\Region;
use App\Http\Resources\RegionResource;

class RegionController extends Controller
{
    /**
    * 
    * @OA\Get(
    *   path="/api/v1/countries/{country-id}/regions",
    *   tags={"Manage Regions"},
    *   summary="List regions under a given country.",
    *   operationId="list-regions",
    *
    *  @OA\Parameter(
    *      description="Country ID in the database",
    *      name="country-id",
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
    public function index($country)
    {
        // get all regions for a given country
        $regions = Region::where('country', '=', $country)->get();
        return response()->json(['Status'=>true,'Regions'=>RegionResource::collection($regions)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionPostRequest $request, $country)
    {
        //
        Region::create([
            'region_name'=>$request->input('region_name'),
            'region_code'=>$request->input('region_code'),
            'country'=>$country
        ]);
        return response()->json([
            'Status'=>true,
            'Message'=>'Region successfully created.'
        ]);
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
        $region = new RegionResource(Region::findOrFail($id));
        return response()->json(['Status'=>true, 'Region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegionPutRequest $request, $id)
    {
        //
        Region::find($id)->update([
            'region_name'=>$request->input('region_name'),
            'region_code'=>$request->input('region_code')
        ]);
        return response()->json([
            'Status'=>true,
            'Message'=>'Region info successfully updated.'
        ]);
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
        Region::find($id)->delete();
        return response()->json([
            'Status'=>true,
            'Message'=>'Region deleted successfully.'
        ]);
    }
}
