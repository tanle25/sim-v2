<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $user;
    public $password_confirmation, $password;
    protected $rules =[
        'user.name'=>'required',
        'user.email'=>'required',
        'user.phone'=>'nullable',
        'user.password'=>'required',
    ];
    public function mount()
    {
        # code...
        $this->user = new User();
    }

    public function submit()
    {
        # code...
        $this->validate([
            'user.name'=>'required',
            'user.email'=>'required|unique:users,email|email',
            'user.phone'=>'nullable|unique:users,phone',
            'password'=>'required|min:8|confirmed'
        ],[
            'required'=>':attribute không được để trống',
            'unique'=>':attribute đã tồn tại',
            'min'=>':attribute tối thiểu 8 ký tự',
            'confirmed'=>':attribute xác nhận không hợp lệ'
        ],[
            'user.name'=>'Họ tên',
            'user.email'=>'Email',
            'user.phone'=>'Số điện thoại',
            'password'=>'Mật khẩu',
        ]);
        $this->user->password = Hash::make($this->password);
        $this->user->save();


        Auth::login($this->user);
        return redirect('danh-sach-sim');
    }
    public function render()
    {
        return view('livewire.register');
    }
}
