<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Country\CountryController;

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
Route::group(['prefix'=>'auth'], function(){
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
});
/**
 * API endpoints realted to managing countries
*/
Route::apiResource('countries',CountryController::class);

