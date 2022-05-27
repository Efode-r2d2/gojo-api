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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function destroy($id)
    {
        //
    }
}
