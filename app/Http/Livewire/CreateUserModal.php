<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateUserModal extends ModalComponent
{
    public $user;
    public $password;

    protected $rules = [
        'user.name'=>'required',
        'user.email'=>'required',
        'user.phone'=>'nullable',
    ];
    public static function modalMaxWidth(): string
    {
        return 'md';
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

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
            'user.email'=>'required|unique:users,email|email:rfc,dns',
            'user.phone'=>'nullable|unique:users,phone|digits_between:10,15',
            'password'=>'required|string|min:8'
        ],[
            'required'=>':attribute không được để trống',
            'unique'=>':attribute đã tồn tại',
            'min'=>':attribute tối thiểu 8 ký tự',
            'email'=>':attribute không hợp lệ',
            'digits_between'=>':attribute gồm 10 - 15 số'
        ],[
            'user.name'=>'Họ tên',
            'user.email'=>'Email',
            'user.password'=>'Mật khẩu'
        ]);
        $this->user->password = Hash::make($this->password);
        $this->user->status = 1;
        $this->user->save();
        $this->emit('closeModal');
        $this->emitTo('livewire-toast', 'show', 'Thêm đại lý thành công');
    }
    public function render()
    {
        return view('livewire.create-user-modal');
    }
}
