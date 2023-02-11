<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditUserModal extends ModalComponent
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
    public function mount($user)
    {
        # code...
        $this->user = User::find($user);
    }

    public function submit()
    {
        # code...
        $user = $this->user;
        $this->validate([
            'user.name'=>'required',
            'user.email'=>'required|email:rfc,dns|unique:users,email,'.$user->id,
            'user.phone'=>'nullable|digits_between:10,15|unique:users,phone,'.$user->id,
            'password'=>'nullable|min:8'
        ],[
            'required'=>':attribute không được để trống',
            'unique'=>':attribute đã tồn tại',
            'email'=>':attribute không hợp lệ',
            'digits_between'=>':attribute gồm 10 - 15 số',
            'min'=>':attribute tối thiểu 8 ký tự'
        ],[
            'user.name'=>'Họ tên',
            'user.email'=>'Email',
            'user.phone'=>'Số điện thoại',
            'password'=>'Mật khẩu'
        ]);
        if($this->password != null){
            $this->user->password = Hash::make($this->password);
        }
        $this->user->save();
        $this->emit('closeModal');
        $this->emitTo('livewire-toast', 'show', 'Cập nhật thành công');
        $this->emit('reloadUser');
    }
    public function render()
    {
        return view('livewire.edit-user-modal');
    }
}
