<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Mail\FogotPassword;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FogotPasswordComponent extends Component
{
    public $email;
    public $isSuccess = false;

    function sendEmail()
    {
        # code...
        $this->validate([
            'email'=>'required|email|exists:users,email'
        ],[
            'required'=>':attribute không được để trống',
            'email'=>':attribute không hợp lệ',
            'exists'=>':attribute chưa được đăng ký',
        ],[
            'email'=>'Email'
        ]);

        $user = User::where('email', $this->email)->first();

        do {
            # code...
            $token = Str::random(32);
        } while (DB::table('password_resets')->where('token', $token)->first());
        if(DB::table('password_resets')->where('email', $user->email)->first()){
            DB::table('password_resets')->where('email', $user->email)->delete();
        }
        DB::table('password_resets')->insert(['email'=>$user->email,'token'=>$token]);

        try {
            $data['name'] = $user->name;
            $data['token'] = $token;
            Mail::to($user->email)->send(new FogotPassword($data));
            $this->isSuccess = true;
        } catch (\Throwable $th) {
            //throw $th;
            $this->isSuccess = false;
            // dd($th);
        }

    }

    public function setStatus()
    {
        # code...
        $this->isSuccess = false;
    }
    public function render()
    {
        return view('livewire.fogot-password-component');
    }
}
