<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerManager extends Component
{
    use WithPagination;
    public $keyword;
    protected $listeners =['reloadCustomer'];

    public function reloadCustomer()
    {
        # code...
        $this->render();
    }
    public function render()
    {
        $keyword = $this->keyword;
        $customers = Customer::where('name','like',"%$keyword%")->paginate(10);
        return view('livewire.customer-manager',['customers'=>$customers]);
    }
}
