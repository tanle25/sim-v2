<?php

namespace App\Http\Livewire;

use App\Models\Network;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditNetworkModal extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'md';
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public $network, $name;

    public function mount($network)
    {
        # code...
        $this->network = Network::find($network);
        $this->name = $this->network->name;
    }

    public function submit()
    {
        # code...
        $this->validate([
            'name'=>'required'
        ],[
            'required'=>':attribute không được để trống',
        ],[
            'name'=>'Tên nhà mạng'
        ]);
        $this->network->name = $this->name;
        $this->network->save();
        $this->emit('reloadNetwork');
        $this->emitTo('livewire-toast', 'show', 'Cập nhật thành công');
        $this->emit('closeModal');
    }
    public function render()
    {
        return view('livewire.edit-network-modal');
    }
}
