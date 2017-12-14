<?php

use Illuminate\Http\Request;
use App\Unit;
use App\Company;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/test', function(Request $request){
        return json_encode('hello yourself');
});

Route::post('/units', function(Request $request){
    $company = Company::where('api_key', $request->api_key)->first();

    $units = Unit::where('company_id', $company->id)
        ->where('status', 'published')
        ->with('photos')
        ->get()->toJson();
    return $units;
});
