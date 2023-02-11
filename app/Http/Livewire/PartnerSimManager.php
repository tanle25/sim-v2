<?php

namespace App\Http\Livewire;

use App\Exports\ExportPartnerSim;
use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\SimOwner;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class PartnerSimManager extends Component
{
    use WithPagination;
    public $user;
    public $start, $stop;
    public function mount($user)
    {
        # code...
        $this->user = User::find($user);
    }

    public function export()
    {
        # code...
        $fileName = 'Dai-ly-'. Str::slug($this->user->name).'.xlsx';
        $sims = $this->user->sims()->with('sim.network');

        if($this->start !=null && $this->stop !=null){
            $start = Carbon::parse($this->start)->startOfDay();
            $stop = Carbon::parse($this->stop)->endOfDay();
            $sims->whereBetween('created_at',[$start,$stop]);
        }
        $sims = $sims->get();
        return Excel::download( new ExportPartnerSim($sims), $fileName);
    }
    public function render()
    {
        $sims = $this->user->sims()->with('sim.network');

        if($this->start !=null && $this->stop !=null){
            $start = Carbon::parse($this->start)->startOfDay();
            $stop = Carbon::parse($this->stop)->endOfDay();
            $sims->whereBetween('created_at',[$start,$stop]);
        }
        $sims = $sims->paginate(10);
        return view('livewire.partner-sim-manager',['sims'=>$sims]);
    }
}
