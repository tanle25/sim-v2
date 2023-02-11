<?php

namespace App\Http\Livewire;

use App\Models\Network;
use App\Models\Sim;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteNetworkModal extends ModalComponent
{
    public $network;
    public static function modalMaxWidth(): string
    {
        return 'md';
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
    public function mount($network)
    {
        # code...Sim
        $this->network = Network::find($network);
    }

    public function submit()
    {
        # code...
        // dd('submit');
        Sim::where('network_id', $this->network->id)->update([
            'network_id'=>null
        ]);
        $this->network->delete();
        $this->emit('reloadNetwork');
        $this->emit('closeModal');
        $this->emitTo('livewire-toast', 'show', 'Xoá thành công');
    }
    public function render()
    {
        return view('livewire.delete-network-modal');
    }
}
