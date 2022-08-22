<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('front.login.index');
    }
    public function store(LoginRequest $request)
    {
        try {
            $user = User::where(['phone' => $request->get('phone'), 'password' => $request->get('password')])->first();
            if ($user) {
                Auth::login($user);
            }
            return redirect()->route('home');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
