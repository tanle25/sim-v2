<?php

namespace App\Http\Livewire;

use App\Models\HistoryChange;
use Livewire\Component;
use Livewire\WithPagination;

class HistoryAll extends Component
{
    use WithPagination;
    public function render()
    {
        $histories = HistoryChange::paginate(10);
        return view('livewire.history-all',['histories'=>$histories]);
    }
}
