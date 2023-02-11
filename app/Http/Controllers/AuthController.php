<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        # code...
        return Socialite::driver('google')->redirect();

    }
    public function handleGoogleCallback()
    {
        # code...
        $user = Socialite::driver('google')->user();
        $this->registerOrLogin($user);
        return redirect()->to('/');
    }

    public function redirectToFacebook()
    {
        # code...
        return Socialite::driver('facebook')->redirect();

    }
    public function handleFacebookCallback()
    {
        # code...
        $user = Socialite::driver('facebook')->user();
        // dd($user);

        $this->registerOrLogin($user);
        return redirect()->to('/');
    }

    public function registerOrLogin($data)
    {
        # code...
        $user = User::where('email',$data->email)->first();
        if(!$user){
            $user = User::create([
                'email'=>$data->email,
                'name'=>$data->name,
                'avatar'=>$data->avatar,
                'provider_id'=>$data->id
            ]);
        }
        Auth::login($user);
    }



    public function resetPassword($token)
    {
        # code...
        $email = DB::table('password_resets')->where('token',$token)->first();

        if(!$email){
            abort(404);
        }
        return view('auth.reset-password',['token'=>$token]);
    }
}
