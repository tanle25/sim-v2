<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Login extends Component
{
    public $user;
    public $remember = true;
    protected $rules = [
        'user.email'=>'required|email',
        'user.password'=>'required'
    ];
    public function submit()
    {
        # code...
        // dd($this->user, $this->remember);
        $this->validate([
            'user.email'=>'required|email',
            'user.password'=>'required'
        ],[
            'required'=>':attribute không được để trống',
            'email'=>':attribute không đúng định dạng',
        ],[
            'user.email'=>'Email',
            'user.password'=>'Mật khẩu'
        ]);
        if(Auth::attempt($this->user, $this->remember)){
            $this->emitTo('livewire-toast', 'show', 'Đăng nhập thành công');
            return redirect('/danh-sach-sim');
        }else{
            Session::flash('loginFail','Sai email hoặc mật khẩu');
        }
    }
    public function render()
    {
        return view('livewire.login');
    }
}
