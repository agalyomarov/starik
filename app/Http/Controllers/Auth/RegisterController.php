<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\SmsVerify;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                return redirect()->back()->withErrors(['code' => 'Выбранное значение для Код подверждение некорректно.']);
            }
            $user = User::create([
                'email' => $data['email'],
                'phone' => $data['phone'],
                'name' => $data['name'],
                'family' => $data['last_name'],
                'patronymic' => $data['patronymic'],
                'birthday' => $data['birthday'],
                'soc_link' => $data['soc_link'],
                'adress' => $request->get('adress', ' '),
                'about' => $request->get('about', ''),
                'password' => $data['password'],
                'created_at' => Carbon::now()
            ]);
            Auth::login($user);
            return redirect()->route('home');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
