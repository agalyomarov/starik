<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function index()
    {
        return Socialite::driver('google')->redirect();
    }

    public function store()
    {
        try {
            $user = Socialite::driver('google')->user();
            $data = $user->user;
            $check = User::where('email', $data['email'])->first();
            if ($check) {
                Auth::login($check);
                return redirect()->route('home');
            }
            $user = User::create(['email' => $data['email'], 'name' => $data['given_name'], 'family' => $data['family_name']]);
            Auth::login($user);
            return redirect()->route('home');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
