<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Component;
use Livewire\WithPagination;

class DealerManager extends Component
{
    use WithPagination;
    public $keyword = '';

    protected $listeners = ['reloadUser'];
    public function reloadUser()
    {
        # code...
        $this->render();
    }
    public function render()
    {
        $keyword = $this->keyword;
        $dealers = User::where('is_admin',0)->where('name','LIKE',"%$keyword%")->paginate(10);
        return view('livewire.dealer-manager',['dealers'=>$dealers]);
    }
}
