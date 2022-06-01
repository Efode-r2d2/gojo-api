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
    *   summary="Login using phone_number and password.",
    *   operationId="list-countries",
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
    public function index()
    {
        return response()->json(['Status'=>true, 'Countries'=>CountryResource::collection(Country::all())]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $country = new CountryResource(Country::find($id));
        return response()->json(['Status'=>true, 'Country'=>$country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Country::find($id)->delete();
        return response()->json(['Status'=>true, 'Message'=>'Country successfully deleted.']);
    }
}
