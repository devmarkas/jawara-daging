<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PushNotificationInfo;


class PushNotificationInfoController extends Controller
{
    public function index()
    {

        $data_notif_info = PushNotificationInfo::all();
        return response()
            ->json([
                'message' => 'Data Notification Info',
                'data' => $data_notif_info,
            ], 200);

    }
}
