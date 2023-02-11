<?php

namespace App\Http\Livewire;

use App\Models\Sim;
use Livewire\Component;
use Livewire\WithPagination;

class ManagerCancelSim extends Component
{
    use WithPagination;

    // public $simCards;

    public function mount()
    {
        # code...

    }


    public function render()
    {
        $simCards = Sim::where('status',2)->paginate(10);
        return view('livewire.manager-cancel-sim',['simCards'=>$simCards]);
    }
}
