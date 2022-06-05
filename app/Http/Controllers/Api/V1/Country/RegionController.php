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
    * 
    * @OA\Post(
    *   path="/api/v1/countries/{country-id}/regions",
    *   tags={"Manage Regions"},
    *   summary="Create region using region_name and region_code.",
    *   operationId="store-region",
    *
    *  @OA\Parameter(
    *      description="ID of the country.",
    *      name="country-id",
    *      in="path",
    *      required=true,
    *      @OA\Schema(
    *           type="integer",
    *           format="int64"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="region_name",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="region_code",
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
    * 
    * @OA\Get(
    *   path="/api/v1/regions/{region-id}",
    *   tags={"Manage Regions"},
    *   summary="Show a given region.",
    *   operationId="show-region",
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
        $region = new RegionResource(Region::findOrFail($id));
        return response()->json(['Status'=>true, 'Region'=>$region]);
    }

    /**
    * 
    * @OA\Put(
    *   path="/api/v1/regions/{region-id}",
    *   tags={"Manage Regions"},
    *   summary="Update region_name and region_code of a given region.",
    *   operationId="update-region",
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
    *      name="region_name",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="region_code",
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
    * 
    * @OA\Delete(
    *   path="/api/v1/regions/{region-id}",
    *   tags={"Manage Regions"},
    *   summary="Delete a given region.",
    *   operationId="delete-region",
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
        Region::find($id)->delete();
        return response()->json([
            'Status'=>true,
            'Message'=>'Region deleted successfully.'
        ]);
    }
}
