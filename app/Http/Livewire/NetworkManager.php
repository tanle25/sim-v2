<?php

namespace App\Http\Livewire;

use App\Models\Network;
use Livewire\Component;
use Livewire\WithPagination;

class NetworkManager extends Component
{
    use WithPagination;
    protected $listeners = ['reloadNetwork'];
    public function reloadNetwork()
    {
        # code...
        $this->render();
    }

    public function render()
    {
        $networks = Network::paginate(10);
        return view('livewire.network-manager',['networks'=>$networks]);
    }
}
