<?php

namespace App\Http\Controllers\Api\V1\Request;

use App\Models\User;
use App\Jobs\NotifyViaMqtt;
use App\Models\Admin\Driver;
use Illuminate\Http\Request;
use App\Jobs\NotifyViaSocket;
use App\Models\Request\RequestMeta;
use App\Base\Constants\Masters\PushEnums;
use App\Http\Controllers\Api\V1\BaseController;
use App\Models\Request\Request as RequestModel;
use App\Http\Requests\Request\AcceptRejectRequest;
use App\Jobs\Notifications\AndroidPushNotification;
use App\Models\Admin\VehicleType;
use App\Transformers\Requests\TripRequestTransformer;
use App\Models\Request\DriverRejectedRequest;

/**
 * @group Driver-trips-apis
 *
 * APIs for Driver-trips apis
 */
class RequestAcceptRejectController extends BaseController
{
    protected $request;

    public function __construct(RequestModel $request)
    {
        $this->request = $request;
    }

    /**
    * Driver Response for Trip Request
    * @bodyParam request_id uuid required id request
    * @bodyParam is_accept boolean required response of request i.e accept or reject. input should be 0 or 1.
    * @response {
    "success": true,
    "message": "success"}
    */
    public function respondRequest(AcceptRejectRequest $request)
    {
        /**
        * Get Request Detail
        * Validate the request i,e the request is already accepted by some one and it is a valid request for accept or reject state.
        * If is_accept is true then update the driver's id to the request detail.
        * And Update the driver's available state as false. And delete all meta driver records from request_meta table
        * Send the notification to the user with request detail.
        * If is_accept is false, then delete the driver record from request_meta table
        * And Send the request to next driver who is available in the request_meta table
        * If there is no driver available in request_meta table, then send notification with no driver available state to the user.
        */
        // Get Request Detail
        $request_detail = $this->request->where('id', $request->input('request_id'))->first();
        // Validate the request i,e the request is already accepted by some one and it is a valid request for accept or reject state.
        $this->validateRequestDetail($request_detail);
        $driver = auth()->user()->driver;

        if ($request->input('is_accept')) {
            // Update Driver to the trip request detail
            $updated_params = ['driver_id'=>auth()->user()->driver->id,
            'accepted_at'=>date('Y-m-d H:i:s'),
            'is_driver_started'=>true];
            $request_detail->update($updated_params);
            $request_detail->fresh();
            // Delete all Meta records of the request
            $this->deleteMetaRecords($request);
            // Update the driver's available state as false
            $driver->available = false;
            $driver->save();
            $request_result =  fractal($request_detail, new TripRequestTransformer);
            $push_request_detail = $request_result->toJson();
            if ($request_detail->if_dispatch) {
                goto accet_dispatch_notify;
            }
            $user = User::find($request_detail->user_id);
            $title = trans('push_notifications.trip_accepted_title');
            $body = trans('push_notifications.trip_accepted_body');
            $push_data = ['notification_enum'=>PushEnums::TRIP_ACCEPTED_BY_DRIVER,'result'=>(string)$push_request_detail];
            $user->notify(new AndroidPushNotification($title, $body));

            // Form a socket sturcture using users'id and message with event name
            $socket_data = new \stdClass();
            $socket_data->success = true;
            $socket_data->success_message  = PushEnums::TRIP_ACCEPTED_BY_DRIVER;
            $socket_data->result = $request_result;
            // Form a socket sturcture using users'id and message with event name
            // $socket_message = structure_for_socket($user->id, 'user', $socket_data, 'trip_status');
            // dispatch(new NotifyViaSocket('transfer_msg', $socket_message));
            dispatch(new NotifyViaMqtt('trip_status_'.$user->id, json_encode($socket_data), $user->id));
            accet_dispatch_notify:
        // @TODO send sms,email & push notification with request detail
        } else {

            $request_result =  fractal($request_detail, new TripRequestTransformer)->parseIncludes('userDetail');
            // Save Driver Reject Requests
            DriverRejectedRequest::create(['request_id'=>$request_detail->id,
                'driver_id'=>$driver->id]);

            $push_request_detail = $request_result->toJson();
           // $request_metas = RequestMeta::where('request_id', $request->input('request_id'))->get();
            // Delete Driver record from meta table
            RequestMeta::where('request_id', $request->input('request_id'))->where('driver_id', $driver->id)->delete();
            // Send request to next driver 
           $request_meta = RequestMeta::where('request_id', $request->input('request_id'))->first();
           /* if ($request_metas->count() == 1) {
                $vehicle_type_id = VehicleType::where("name", $request_detail->vehicle_type_name)->first()->id;
                $available_drivers = $this->getFirebaseDrivers(["lat" => $request_detail->requestPlace->pick_lat, "lng" => $request_detail->pick_lng], $vehicle_type_id);
                $selected_drivers = [];
                $i = 0;
                foreach ($available_drivers as $driver) {
                    // $selected_drivers[$i]["request_id"] = $request_detail->id;
                    $selected_drivers[$i]["user_id"] = $request_metas[0]->user_id;
                    $selected_drivers[$i]["driver_id"] = $driver->id;
                    $selected_drivers[$i]["active"] = $i == 0 ? 1 : 0;
                    $selected_drivers[$i]["assign_method"] = 1;
                    $selected_drivers[$i]["created_at"] = date('Y-m-d H:i:s');
                    $selected_drivers[$i]["updated_at"] = date('Y-m-d H:i:s');
                    $i++;
                }
                foreach ($selected_drivers as $key => $selected_driver) {
                    $request_detail->requestMeta()->create($selected_driver);
                }
            }*/
	    if ($request_meta) {
                $request_meta->update(['active'=>true]);
                // @TODO Send push notification like create request to the driver
                $title = trans('push_notifications.new_request_title');
                $body = trans('push_notifications.new_request_body');
                $push_data = ['notification_enum'=>PushEnums::REQUEST_CREATED,'result'=>(string)$push_request_detail];
                $driver = Driver::find($request_meta->driver_id);
                $notifiable_driver = $driver->user;
                $notifiable_driver->notify(new AndroidPushNotification($title, $body));

                // Form a socket sturcture using users'id and message with event name
                $socket_data = new \stdClass();
                $socket_data->success = true;
                $socket_data->success_message  = PushEnums::REQUEST_CREATED;
                $socket_data->result = $request_result;
                // Form a socket sturcture using users'id and message with event name
                // $socket_message = structure_for_socket($driver->id, 'driver', $socket_data, 'create_request');
                // dispatch(new NotifyViaSocket('transfer_msg', $socket_message));
                dispatch(new NotifyViaMqtt('create_request_'.$driver->id, json_encode($socket_data), $driver->id));
            } else {
                goto no_drivers_available;

                // Cancell the request as automatic cancell state
                $request_detail->update(['is_cancelled'=>true,'cancel_method'=>0]);
                $request_result =  fractal($request_detail, new TripRequestTransformer);
                $push_request_detail = $request_result->toJson();
                // Send push notification as no-driver-found to the user
                if ($request_detail->if_dispatch) {
                    goto dispatch_notify;
                }
                $user = User::find($request_detail->user_id);
                $title = trans('push_notifications.no_driver_found_title');
                $body = trans('push_notifications.no_driver_found_body');
                $user->notify(new AndroidPushNotification($title, $body));
                $push_data = ['notification_enum'=>PushEnums::NO_DRIVER_FOUND,'result'=>(string)$push_request_detail];
                // Form a socket sturcture using users'id and message with event name
                $socket_data = new \stdClass();
                $socket_data->success = true;
                $socket_data->success_message  = PushEnums::NO_DRIVER_FOUND;
                $socket_data->result = $request_result;
                // Form a socket sturcture using users'id and message with event name
                // $socket_message = structure_for_socket($user->id, 'user', $socket_data, 'trip_status');
                // dispatch(new NotifyViaSocket('transfer_msg', $socket_message));
                dispatch(new NotifyViaMqtt('trip_status_'.$user->id, json_encode($socket_data), $user->id));
                dispatch_notify:
                no_drivers_available:
            }
        }

        return $this->respondSuccess();
    }

    /**
    * Delete All Meta driver's records
    */
    public function deleteMetaRecords(Request $request)
    {
        RequestMeta::where('request_id', $request->input('request_id'))->delete();
    }

    /**
    * Validate the request detail
    */
    public function validateRequestDetail($request_detail)
    {
        if ($request_detail->is_driver_started && $request_detail->driver_id!=auth()->user()->driver->id) {
            $this->throwCustomException('request accepted by another driver');
        }

        if ($request_detail->is_completed) {
            $this->throwCustomException('request completed already');
        }
        if ($request_detail->is_cancelled) {
            $this->throwCustomException('request cancelled');
        }
    }
    public function getFirebaseDrivers($request, $type_id)
    {
        $pick_lat = $request['lat'];
        $pick_lng = $request['lng'];
        // NEW flow
        $client = new \GuzzleHttp\Client();
        $url = env('NODE_APP_URL', "http://localhost") . ':' . env('NODE_APP_PORT', "3000") . '/' . $pick_lat . '/' . $pick_lng . '/' . $type_id;
        $res = $client->request('GET', "$url");
        if ($res->getStatusCode() == 200) {
            $fire_drivers = \GuzzleHttp\json_decode($res->getBody()->getContents());
            if (empty($fire_drivers->data)) {

                return null;
                // $this->throwCustomException('no drivers available');
            } else {
                $nearest_driver_ids = [];
                foreach ($fire_drivers->data as $key => $fire_driver) {
                    $nearest_driver_ids[] = $fire_driver->id;
                }

                $driver_search_radius = get_settings('driver_search_radius') ?: 30;

                $haversine = "(6371 * acos(cos(radians($pick_lat)) * cos(radians(pick_lat)) * cos(radians(pick_lng) - radians($pick_lng)) + sin(radians($pick_lat)) * sin(radians(pick_lat))))";
                // Get Drivers who are all going to accept or reject the some request that nears the user's current location.
                $meta_drivers = RequestMeta::whereHas('request.requestPlace', function ($query) use ($haversine, $driver_search_radius) {
                    $query->select('request_places.*')->selectRaw("{$haversine} AS distance")
                        ->whereRaw("{$haversine} < ?", [$driver_search_radius]);
                })->pluck('driver_id')->toArray();

                $nearest_drivers = Driver::where('active', 1)->where('approve', 1)->where('available', 1)->where('vehicle_type', $type_id)->whereIn('id', $nearest_driver_ids)->whereNotIn('id', $meta_drivers)->limit(10)->get();

                if ($nearest_drivers->isEmpty()) {
                    // $this->throwCustomException('all drivers are busy');

                    return null;
                }

                return $nearest_drivers;
            }
        } else {
            $this->throwCustomException('there is an error-getting-drivers');
        }
    }
}
