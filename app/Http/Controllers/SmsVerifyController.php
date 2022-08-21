<?php

namespace App\Http\Controllers;

use App\Models\SmsVerify;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SmsVerifyController extends Controller
{
    public function store(Request $request)
    {
        try {
            $client = new Client();
            $base_url = 'https://smspilot.ru/api.php';
            $code = rand(1111, 9999);
            $message = 'Код подтверждения: ' . $code;
            // $res = $client->post($base_url, [
            //     'form_params' => [
            //         'send' => $message,
            //         'format' => 'json',
            //         'apikey' => config('services.smspilot.api_key'),
            //         'to' => $request->get('phone')
            //     ],
            // ]);
            SmsVerify::updateOrCreate(['phone' => $request->get('phone')], ['phone' => $request->get('phone'), 'code' => $code, 'created_at' => Carbon::now()]);
            return json_encode(['code' => $code]);
        } catch (\Exception $ex) {
            return $ex->getMessage();
            // return redirect('/');
        }
    }
}
