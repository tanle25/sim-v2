<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminManager extends Component
{
    use WithPagination;
    public $keyword;
    protected $listeners = ['reloadAdmin'];
    public function reloadAdmin()
    {
        # code...
        $this->render();
    }
    public function render()
    {
        $keyword = $this->keyword;
        $admins = User::where('is_admin',1)->where('name','like',"%$keyword%")->paginate(10);
        return view('livewire.admin-manager',['admins'=>$admins]);
    }
}
