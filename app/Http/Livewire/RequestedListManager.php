<?php

namespace App\Http\Livewire;

use App\Exports\ExportMySim;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class RequestedListManager extends Component
{
    use WithPagination;
    public $user;
    public function mount()
    {
        # code...
        $this->user = Auth::user();
    }

    public function render()
    {
        $requests = $this->user->requestest()->paginate(10);
        return view('livewire.requested-list-manager',['requests'=>$requests]);
    }
}
