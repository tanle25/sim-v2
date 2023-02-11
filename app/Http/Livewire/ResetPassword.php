<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPassword extends Component
{
    public $password;
    public $password_confirmation;
    public $user;
    public function mount($token)
    {
        # code...
        $email = DB::table('password_resets')->where('token',$token)->first();
        $this->user = User::where('email',$email->email)->first();
    }

    public function submit()
    {
        # code...
        $this->validate([
            'password'=>'min:8|required|confirmed',
        ],[
            'min'=>':attribute tối thiểu 8 ký tự',
            'required'=>':attribute không được để trống',
            'confirmed'=>':attribute xác nhận không hợp lệ'
        ],[
            'password'=>'Mật khẩu'
        ]);
        $this->user->password = Hash::make($this->password);
        DB::table('password_resets')->where('email',$this->user->email)->delete();
        Auth::login($this->user);
        return redirect('/');
    }
    public function render()
    {
        return view('livewire.reset-password');
    }
}
