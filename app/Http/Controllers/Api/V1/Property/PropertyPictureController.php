<?php

namespace App\Http\Controllers\Api\V1\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyPicture;
use App\Http\Requests\Property\PropertyPicturePostRequest;
use App\Http\Requests\Property\PropertyPicturePutRequest;
use App\Http\Resources\PropertyPictureResource;
use Illuminate\Support\Facades\Storage;

class PropertyPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($property)
    {
        $property_picutres = PropertyPicture::where('property_id','=',$property)->get();
        return response()->json(['Status'=>true, 'Property_Pictures'=>PropertyPictureResource::collection($property_picutres)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyPicturePostRequest $request, $property)
    {
        // storing property pitcture
        $property_picture_path = $request->file('property_picture')->store('property_pictures');
        //stroing proprty picture info to database
        PropertyPicture::create([
            'property_picture_path'=>$property_picture_path,
            'property_picture_title'=>$request->property_picture_title,
            'property_picture_discription'=>$request->property_picture_description,
            'property_id'=>$property
        ]);
        //
        return response()->json(['Status'=>true, 'Message'=>'Property picture stored successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property_picture = new PropertyPictureResource(PropertyPicture::find($id));
        return response()->json(['Status'=>true, 'Property_Picture'=>$property_picture]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyPicturePutRequest $request, $id)
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
        $property_picture = PropertyPicture::find($id);
        Storage::delete($property_picture->property_picture_path);
        $property_picture->delete();
        return response()->json(['Status'=>true, 'Message'=>'Property picture deleted successfully.']);

    }
}
