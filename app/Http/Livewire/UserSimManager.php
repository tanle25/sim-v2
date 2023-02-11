<?php

namespace App\Http\Livewire;

use App\Models\Sim;
use Livewire\Component;
use App\Exports\ExportMySim;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UserSimManager extends Component
{
    use WithPagination;
    public $user;
    public $perPage;
    public $keyword;
    public function mount()
    {
        # code...
        $this->perPage = 20;
        $this->user = Auth::user();
    }

    public function changeStatus($id, $status)
    {
        # code...
        // dd($id, $status);
        $sim = Sim::find($id);
        $sim->request()->create([
            'user_id'=>Auth::user()->id,
            'status_to'=>$status,
        ]);
        $this->emitTo('livewire-toast', 'show', 'Đã gửi yêu cầu');

    }
    public function export()
    {
        # code...
        $sims = $this->user->sims;
        $filName = 'Danh-sach-sim.xlsx';
        return Excel::download(new ExportMySim($sims),$filName);
    }
    public function render()
    {
        $keyword = $this->keyword;
        $simCards = $this->user->sims()->whereRelation('sim','phone','like',"%$keyword%")->paginate($this->perPage);
        return view('livewire.user-sim-manager',['simCards'=>$simCards]);
    }
}
