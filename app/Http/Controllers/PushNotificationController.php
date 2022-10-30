<?php

namespace App\Http\Controllers;

use App\Models\PushNotification;
use App\Models\PushNotificationInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PushNotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data_push_notification = PushNotification::all();
        $data_push_notification_info = PushNotificationInfo::all();

        return view('push-notification.index',
        [
            'data_push_notification' => $data_push_notification,
            'data_push_notification_info' => $data_push_notification_info
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                'title_push_notification'         => 'required|string',
                'deskripsi_push_notification'     => 'required|string',
            ]
        );

        $url = 'https://fcm.googleapis.com/fcm/send';

        $serverKey = "AAAAFrKPJtY:APA91bF1xOpcyO6disWav77zWjLxTFLwJCp2ujFYmHnz8m2OWRTOCR-w_ZybHVo3DFl3Kzp4G02lqRR3upTK1Dh1HsTmMuepDLtDcYufA4xK3-h-n-WI94utoOVSjedHs5LWav5Mb2HX";

        $data = [
            "to" => '/topics/notification',
            "notification" => [
                "title" => $request->title_push_notification,
                "body" => $request->deskripsi_push_notification,
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

        // Execute post
        $result = curl_exec($ch);

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);

        // FCM response
        // dd($result);

        PushNotification::create($validator);
        return redirect()->route('push-notification.index')->with('success','Push Notification Publish Successfully.');


    }

    public function destroy($id)
    {
        $data_push_notification = PushNotification::find($id);
        $data_push_notification->delete();

        return redirect()->route('push-notification.index')
                        ->with('success','Push Notification Delete Successfully.');
    }
}
