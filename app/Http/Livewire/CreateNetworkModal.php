<?php

namespace App\Http\Livewire;

use App\Models\Network;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateNetworkModal extends ModalComponent
{
    public $name;
    public static function modalMaxWidth(): string
    {
        return 'md';
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
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
        Network::create([
            'name'=>$this->name,
        ]);
        $this->emit('reloadNetwork');
        $this->emitTo('livewire-toast', 'show', 'Thêm thành công');
        $this->emit('closeModal');
    }
    public function render()
    {
        return view('livewire.create-network-modal');
    }
}
