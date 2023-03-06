<?php

namespace App\Http\Livewire;

use App\Models\Network;
use App\Models\Sim;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AddSimModal extends ModalComponent
{
    public $sim;
    public $networks;
    public $network;
    protected $rules =[
        'sim.phone'=>'required',
        'sim.iccid'=>'required',
        'sim.network_id'=>'nullable',
        'sim.imported_at'=>'nullable',
    ];

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount()
    {
        # code...
        $this->sim = new Sim();
        $this->networks = Network::all();

    }

    public function submit()
    {
        # code...
        // dd($this->sim);
        $this->sim->network_id = $this->network;
        $this->validate([
            'sim.phone'=>'required|unique:sims,phone|digits_between:10,15',
            'sim.iccid'=>'required|unique:sims,iccid|digits_between:10,20',
            'network'=>'nullable|exists:networks,id'
        ],[
            'required'=>':attribute không được để trống',
            'unique'=>':attribute đã tồn tại',
            'exists'=>':attribure không tồn tại',
            'digits_between'=>'Độ dài :attribute không phù hợp'
        ],[
            'sim.phone'=>'Số điện thoại',
            'sim.iccid'=>'ICCID',
            'network'=>'Nhà mạng',
        ]);
        $this->sim->save();
        $this->closeModal();
        $this->emitTo('livewire-toast', 'show', 'Thêm sim thành công!');
    }

    public function render()
    {
        return view('livewire.add-sim-modal');
    }
}
