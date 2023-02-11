<?php

namespace App\Http\Livewire;

use App\Models\Sim;
use Livewire\Component;
use Livewire\WithPagination;

class HistoryManager extends Component
{
    use WithPagination;
    public $sim;

    public function mount(Sim $sim)
    {
        # code...
        $this->sim = $sim;
    }
    public function render()
    {
        $histories = $this->sim->histories()->paginate(10);
        return view('livewire.history-manager',['histories'=>$histories]);
    }
}
