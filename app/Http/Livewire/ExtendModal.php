<?php

namespace App\Http\Livewire;

use App\Models\Sim;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ExtendModal extends ModalComponent
{
    public $sim;

    public $contract;

    protected $rules = [
        'contract.price_out'=>'required',
        'contract.exprired_at'=>'required'
    ];
    public function mount($sim)
    {
        # code...
        $this->sim = Sim::find($sim);
        // $this->contract['exprired_at'] =
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function submit()
    {
        # code...
        // dd($this->contract);
        $this->validate([
            'contract.price_out'=>'required|integer|min:0',
            'contract.exprired_at'=>'required|date',

        ]);
        $owner = $this->sim->owner;
        // dd($owner);
        if(!$owner){
            $this->emitTo('livewire-toast', 'show', ['type' => 'info', 'message' => 'Sim chưa cho thuê!']);
            $this->emit('closeModal');
        } else{
            $owner->userable->invoices()->create([
                'sim_id' => $this->sim->id,
                'rent_at'=>Carbon::today(),
                'exprired_at'=>$this->contract['exprired_at'],
                'price_in'=>$this->sim->price_in,
                'price_out'=>$this->contract['price_out'],
                'type'=>1
            ]);
            $owner->update([
                'exprired_at'=>$this->contract['exprired_at']
            ]);
            $this->emitTo('livewire-toast', 'show', 'Gia hạn thành công');
            $this->emit('reloadData');
            $this->emit('closeModal');
        }
    }
    public function render()
    {
        return view('livewire.extend-modal');
    }
}
