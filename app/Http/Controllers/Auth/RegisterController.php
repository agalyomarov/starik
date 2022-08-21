<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\SmsVerify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class RegisterController extends Controller
{
    public function index()
    {
        return view('front.register.index');
    }
    public function store(RegisterRequest $request)
    {
        try {
            $data = $request->all();
            $sms = SmsVerify::where('phone', $request->get('phone'))->first();
            if (!$sms || $sms->code != $data['code']) {
                return redirect()->back()->withErrors(['code' => 'Код не правильно'], 'code');
            }
            dd($request->all());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
