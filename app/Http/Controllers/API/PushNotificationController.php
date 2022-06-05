<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PushNotification;
use Illuminate\Http\Request;

class PushNotificationController extends Controller
{
    public function index()
    {

        $data_notif = PushNotification::all();
        return response()
            ->json([
                'message' => 'Data Notification',
                'data' => $data_notif,
            ], 200);
        
    }
}
