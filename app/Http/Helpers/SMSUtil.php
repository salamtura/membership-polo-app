<?php

namespace App\Http\Helpers;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
class SMSUtil
{

    public static function sendSMS($msg, $recipients)
    {
        $apiKey = 'APPKEY_mBotA9rx584VdGJPib0sRgULkuZ2QShn';
        $url = 'https://app.sleengshort.com/api/sms/send';

        $data = [
            'sender_id' => 'Slengshot',
            'recipients' => $recipients,
            'msg' => $msg,
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-Api-Key' => $apiKey,
        ])->post($url, $data);

        if ($response->successful()) {
            // Request was successful, handle the response
            return $response->json();
        } else {
            // Request failed, handle the error
            return $response->json(); // or return an error message
        }
    }

}
