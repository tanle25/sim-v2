<?php

namespace App\Http\Livewire;

use App\Models\Network;
use App\Models\Sim;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class UpdateMultipleSimNetwork extends ModalComponent
{
    public $sims;
    public $networks;
    public $network;

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount($sims)
    {
        # code...
        $this->sims = $sims;
        $this->networks = Network::all();
    }

    public function submit()
    {
        # code...
        // dd($this->network);
        $this->validate([
            'network'=>'required'
        ],[
            'required'=>':attribute không được để trống'
        ],[
            'network'=>'Nhà mạng'
        ]);
        // $sims = Sim::whereIn('id',$this->sims)->update([
        //     'network_id' => $this->network
        // ]);
        DB::table('sims')->whereIn('id',$this->sims)->update(['network_id'=>$this->network]);
        $this->emitTo('livewire-toast', 'show', 'Cập nhật thành công!');
        $this->emit('reloadData');
        $this->emit('closeModal');

    }
    public function render()
    {
        return view('livewire.update-multiple-sim-network');
    }
}
