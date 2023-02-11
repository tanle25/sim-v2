<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\SimOwner;
use Livewire\WithPagination;

class DaskboardExpiredSim extends Component
{
    use WithPagination;
    public function render()
    {
        $start = Carbon::today();
        $stop = Carbon::today()->addDays(5);
        $sims = SimOwner::whereBetween('exprired_at',[$start,$stop])->paginate(10);
        return view('livewire.daskboard-expired-sim',['sims'=>$sims]);
    }
}
