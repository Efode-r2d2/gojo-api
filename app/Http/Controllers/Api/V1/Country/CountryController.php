<?php

namespace App\Http\Controllers\Api\V1\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Http\Requests\Country\CountryStoreRequest;
use App\Http\Requests\Country\CountryPutRequest;
use App\Http\Resources\CountryResource;

class CountryController extends Controller
{
    /**
    * 
    * @OA\Get(
    *   path="/api/v1/countries/",
    *   tags={"Manage Countries"},
    *   summary="List available countries.",
    *   operationId="list-countries",
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
        return response()->json(['Status'=>true, 'Countries'=>CountryResource::collection(Country::all())]);
    }

    /**
    * 
    * @OA\Post(
    *   path="/api/v1/countries/",
    *   tags={"Manage Countries"},
    *   summary="Create country using country_name, capital_city, telephone_code and country_code.",
    *   operationId="store-country",
    *
    *  @OA\Parameter(
    *      name="country_name",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="capital_city",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="telephone_code",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="country_code",
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
    public function store(CountryStoreRequest $request)
    {
        Country::create([
            'country_name'=>$request->input('country_name'),
            'capital_city'=>$request->input('capital_city'),
            'telephone_code'=>$request->input('telephone_code'),
            'country_code'=>$request->input('country_code')
        ]);
        return response()->json(['Status'=>true, 'Message'=>'Country created successfully.']);
    }

    /**
    * 
    * @OA\Get(
    *   path="/api/v1/countries/{id}",
    *   tags={"Manage Countries"},
    *   summary="Get an info of a country with a given ID.",
    *   operationId="show-country",
    *
    *  @OA\Parameter(
    *      description="Country ID in the database",
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
        $country = new CountryResource(Country::find($id));
        return response()->json(['Status'=>true, 'Country'=>$country]);
    }

    /**
    * 
    * @OA\Put(
    *   path="/api/v1/countries/{id}",
    *   tags={"Manage Countries"},
    *   summary="Update a country with a given ID.",
    *   operationId="update-country",
    *
    *  @OA\Parameter(
    *      description="Country ID in the database",
    *      name="id",
    *      in="path",
    *      required=true,
    *      @OA\Schema(
    *           type="integer",
    *           format="int64"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="country_name",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="capital_city",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="telephone_code",
    *      in="query",
    *      required=true,
    *      @OA\Schema(
    *           type="string"
    *      )
    *   ),
    *  @OA\Parameter(
    *      name="country_code",
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
    public function update(CountryPutRequest $request, $id)
    {
        //
        Country::find($id)->update([
            'country_name'=>$request->input('country_name'),
            'capital_city'=>$request->input('capital_city'),
            'telephone_code'=>$request->input('telephone_code'),
            'country_code'=>$request->input('country_code')
        ]);

        return response()->json(['Status'=>true, 'Message'=>'Country info successfully updated.']);
    }

    /**
    * 
    * @OA\Delete(
    *   path="/api/v1/countries/{id}",
    *   tags={"Manage Countries"},
    *   summary="Delete a country with a given ID.",
    *   operationId="delete-country",
    *
    *  @OA\Parameter(
    *      description="Country ID in the database",
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
        Country::find($id)->delete();
        return response()->json(['Status'=>true, 'Message'=>'Country successfully deleted.']);
    }
}
