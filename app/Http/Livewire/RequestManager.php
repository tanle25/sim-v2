<?php

namespace App\Http\Livewire;

use App\Models\CustomerRequest;
use Livewire\Component;
use Livewire\WithPagination;

class RequestManager extends Component
{
    use WithPagination;
    public function render()
    {
        $requests = CustomerRequest::paginate(10);
        return view('livewire.request-manager',['requests'=>$requests]);
    }
}
