<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteUserModal extends ModalComponent
{
    public $user;
    public function mount($user)
    {
        # code...
        $this->user = User::find($user);
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function deleteUser()
    {
        # code...
        $this->user->delete();
        $this->emit('closeModal');
        $this->emitTo('livewire-toast', 'show', 'Xoá thành công');
        $this->emit('reloadUser');
    }
    public function render()
    {
        return view('livewire.delete-user-modal');
    }
}
