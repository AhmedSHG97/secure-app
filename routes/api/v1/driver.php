<?php

/*
|--------------------------------------------------------------------------
| Admin API Routes
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

/**
 * These routes are prefixed with 'api/v1'.
 * These routes use the root namespace 'App\Http\Controllers\Api\V1\Driver'.
 * These routes use the middleware group 'auth'.
 */


Route::prefix('driver')->namespace('Driver')->middleware('auth')->group(function () {
    Route::middleware(role_middleware(Role::DRIVER))->group(function () {
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
        // get DriverDocument
        Route::get('documents/needed', 'DriverDocumentController@index');
        // Upload Driver document
        Route::post('upload/documents', 'DriverDocumentController@uploadDocuments');
        // List All Uploaded Documents
        // Route::get('uploaded/documents', 'DriverDocumentController@listUploadedDocuments');
        // Online-offline
        Route::post('online-offline', 'OnlineOfflineController@toggle');
        Route::get('today-earnings', 'EarningsController@index');
        Route::get('weekly-earnings', 'EarningsController@weeklyEarnings');
        Route::get('earnings-report/{from_date}/{to_date}', 'EarningsController@earningsReport');
    });
});
