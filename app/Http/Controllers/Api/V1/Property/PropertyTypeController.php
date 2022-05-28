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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(['Status'=>true, 'Property_Types'=>PropertyType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return response()->json(['Status'=>true, 'Property_Type'=>PropertyType::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
