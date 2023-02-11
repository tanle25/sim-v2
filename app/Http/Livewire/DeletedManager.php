<?php

namespace App\Http\Livewire;

use App\Models\Sim;
use Livewire\Component;
use Livewire\WithPagination;

class DeletedManager extends Component
{
    use WithPagination;
    public function render()
    {
        $histories = Sim::onlyTrashed()->paginate(10);
        return view('livewire.deleted-manager',['histories'=>$histories]);
    }
}
