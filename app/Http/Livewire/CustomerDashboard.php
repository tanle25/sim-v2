<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerDashboard extends Component
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
        $totalSim = $this->user->sims->count();
        $start = Carbon::today();
        $stop = Carbon::today()->addDays(5)->endOfDay();
        $sims = $this->user->sims()->whereBetween('exprired_at',[$start, $stop])->paginate(10);
        $exprired = $this->user->sims()->whereBetween('exprired_at',[$start, $stop])->count();
        $requestest = $this->user->requestest->count();


        return view('livewire.customer-dashboard', compact('sims','totalSim','exprired','requestest'));
    }
}
