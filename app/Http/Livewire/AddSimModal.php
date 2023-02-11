<?php

namespace App\Http\Livewire;

use App\Models\Sim;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AddSimModal extends ModalComponent
{
    public $sim;

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
    }

    public function submit()
    {
        # code...
        // dd($this->sim);
        $this->validate([
            'sim.phone'=>'required|unique:sims,phone',
            'sim.iccid'=>'required|unique:sims,iccid',
            'sim.network_id'=>'nullable|exists:networks,id'
        ],[
            'required'=>':attribute không được để trống',
            'unique'=>':attribute đã tồn tại',
            'exists'=>':attribure không tồn tại'
        ],[
            'sim.phone'=>'Số điện thoại',
            'sim.iccid'=>'ICCID',
            'sim.network_id'=>'Nhà mạng'
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
