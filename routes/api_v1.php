<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Country\CountryController;
use App\Http\Controllers\Api\V1\Country\RegionController;
use App\Http\Controllers\Api\V1\Country\CityController;
use App\Http\Controllers\Api\V1\Property\PropertyTypeController;
use App\Http\Controllers\Api\V1\Property\PropertyController;
use App\Http\Controllers\Api\V1\Property\PropertyPictureController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('user', UserController::class);
/*
 * API endpoints related to authentication
*/
Route::group(['prefix'=>'auth', ['middleware'=>'auth:api']], function(){
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
});
/**
 * API endpoints realted to managing countries, regions and cities
*/
Route::apiResource('countries', CountryController::class)->middleware(['auth:api']);
/**
 * API endpoints related to managing regions of a given country
 */
Route::apiResource('countries.regions', RegionController::class)->shallow()->middleware(['auth:api']);
/**
 * API endpoints related to managing cities under a given region
 */
Route::apiResource('regions.cities', CityController::class)->shallow()->middleware(['auth:api']);
/**
 * API endpoints realted to managing property types
 */
Route::apiResource('property_types', PropertyTypeController::class)->middleware(['auth:api']);
/**
 * API endpoints related to managing properties
 */
Route::apiResource('properties', PropertyController::class)->middleware(['auth:api']);
/**
 * API endpoints related to managing propery pictures
 */
Route::apiResource('properies.property_pictures', PropertyPictureController::class)->shallow()->middleware(['auth:api']);

