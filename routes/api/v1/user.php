<?php

/*
|--------------------------------------------------------------------------
| User API Routes
|--------------------------------------------------------------------------
|
| These routes are prefixed with 'api/v1'.
| These routes use the root namespace 'App\Http\Controllers\Api\V1'.
|
 */
use App\Base\Constants\Auth\Role;
use App\Models\Luck;
use Carbon\Carbon;
use Illuminate\Routing\ResponseFactory;
/*
 * These routes are prefixed with 'api/v1/user'.
 * These routes use the root namespace 'App\Http\Controllers\Api\V1\User'.
 * These routes use the middleware group 'auth'.
 */
Route::prefix('user')->namespace('User')->middleware('auth')->group(function () {
    // Get the logged in user.
    Route::get('/', 'AccountController@me');
    Route::get('luckWheel', function(ResponseFactory $response){
        $user_id = auth()->user()->id;
        $user_count = Luck::where('status',0)->where("user_id",$user_id)->whereDay("updated_at",Carbon::now()->format('d'))->count();
        if($user_count == 0){
            $data =  Luck::where('status',1)->inRandomOrder()->first();
            if($data){
                $data->update(['status' => 0, 'updated_at' => now(), 'user_id' => $user_id]);
                $data->refresh();
            }
            $body = [
                "status" => true,
                "message" => "data sent successfully",
                "data" => $data
            ];
            
            return $response->json($body,200, [], JSON_NUMERIC_CHECK);
        }
        $body = [
            "status" => true,
            "message" => "you can only use this once",
            "data" => null
        ];
        return $response->json($body,200, [], JSON_NUMERIC_CHECK);
       
    });
    Route::get('checkLuckWheel', function(ResponseFactory $response){
        $user_id = auth()->user()->id;
        $user_count = Luck::where('status',0)->where("user_id",$user_id)->whereDay("updated_at",Carbon::now()->format('d'))->count();
        if($user_count == 0){
            $body = [
                "status" => true,
                "message" => "wheel is available",
                "data" => null
            ];
            
            return $response->json($body,200, [], JSON_NUMERIC_CHECK);
        }
        $body = [
            "status" => false,
            "message" => "wheel is not available for that user know",
            "data" => null
        ];
        return $response->json($body,200, [], JSON_NUMERIC_CHECK);
       
    });
    /**
     * These routes use the middleware group 'role'.
     * These routes are accessible only by a user with the 'user' role.
     */
    Route::middleware('auth')->group(function () {

        // Update user password.
        Route::post('password', 'ProfileController@updatePassword');
        // Update user profile.
        Route::post('profile', 'ProfileController@updateProfile');
        Route::post('driver-profile', 'ProfileController@updateDriverProfile');
        Route::post('update-my-lang', 'ProfileController@updateMyLanguage');
        Route::post('update-bank-info','ProfileController@updateBankinfo');
        Route::get('get-bank-info','ProfileController@getBankInfo');
        // Add Favourite location
        Route::get('list-favourite-location','ProfileController@FavouriteLocationList');
        Route::post('add-favourite-location','ProfileController@addFavouriteLocation');
        Route::get('delete-favourite-location/{favourite_location}','ProfileController@deleteFavouriteLocation');
    });
});

Route::get('test-socket', function () {
    return 'yess its works';
});

Route::namespace('VehicleType')->middleware('auth')->prefix('types')->group(function () {
    // get types depends on the location
    Route::get('/{lat}/{lng}', 'VehicleTypeController@getTypesByLocationOld');
    Route::get('/by-location/{lat}/{lng}', 'VehicleTypeController@getTypesByLocationAlongPrice');

    // Route::post('/{vehicle_type}','VehicleTypeController@update');
});
