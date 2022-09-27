<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PushNotificationInfo;
use Illuminate\Support\Facades\Validator;



class PushNotificationInfoController extends Controller
{
    public function index()
    {
        $data_push_notification_info = PushNotificationInfo::all();
        return view('push-notification.index', ['data_push_notification_info' => $data_push_notification_info]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                'title_push_notification_info'          => 'required|string',
                'deskripsi_push_notification_info'      => 'required|string',
                'image_push_notification_info'          => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'key_product_push_notification_info'    => 'required|string',
                'value_product_push_notification_info'  => 'required|string',
            ]
        );

        $url = 'https://fcm.googleapis.com/fcm/send';

        $serverKey = "AAAAFrKPJtY:APA91bF1xOpcyO6disWav77zWjLxTFLwJCp2ujFYmHnz8m2OWRTOCR-w_ZybHVo3DFl3Kzp4G02lqRR3upTK1Dh1HsTmMuepDLtDcYufA4xK3-h-n-WI94utoOVSjedHs5LWav5Mb2HX";

        $data = [
            "to" => '/topics/notification-info',
            "notification" => [
                "title" => $request->title_push_notification_info,
                "body" => $request->deskripsi_push_notification_info,
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

        if($request->file('image_push_notification_info'))
        {
            $path = $request->file('image_push_notification_info')->store('public/Image/Push_Notification_Info');
            $nameFile = 'storage/Image/Push_Notification_Info/'.$request->file('image_push_notification_info')->hashName();
            $validator['image_push_notification_info'] = $nameFile;
        }


        PushNotificationInfo::create($validator);
        return redirect()->route('push-notification.index')->with('success','Push Notification Info Publish Successfully.');


    }

}
