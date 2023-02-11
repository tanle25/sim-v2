<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteAdminModal extends ModalComponent
{

    public $user;
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
        $this->user->delete();
        $this->closeModal();
        $this->emitTo('livewire-toast', 'show', 'Xoá thành công');
        $this->emit('reloadAdmin');
    }

    public function render()
    {
        return view('livewire.delete-admin-modal');
    }
}
