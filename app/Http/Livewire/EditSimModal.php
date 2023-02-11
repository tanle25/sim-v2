<?php

namespace App\Http\Livewire;

use App\Models\Network;
use App\Models\Sim;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditSimModal extends ModalComponent
{

    public $sim;
    public $networks;

    protected $rules = [
        'sim.phone'=>'required',
        'sim.iccid'=>'required',
        'sim.price_in'=>'nullable',
        'sim.network_id'=>'nullable',
        'sim.imported_at'=>'nullable',
        'sim.expired_at'=>'nullable'
    ];
    public static function modalMaxWidth(): string
    {
        return 'md';
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
    public function mount($sim)
    {
        # code...
        $this->sim = Sim::find($sim);
        $this->networks = Network::all();
    }

    public function submit()
    {
        # code...
        // dd($this->sim);
        $this->validate([
            'sim.phone'=>'required|unique:sims,phone,'.$this->sim->id,
            'sim.iccid'=>'required|unique:sims,iccid,'.$this->sim->id,
            'sim.price_in'=>'nullable|integer',
            'sim.network_id'=>'nullable|exists:networks,id',
            'sim.imported_at'=>'nullable|date',
            'sim.expired_at'=>'nullable|date'
        ],[
            'required'=>':attribute không được để trống',
            'unique'=>':attribute đã tồn tại',
            'exists'=>':attribute không tồn tại',
            'integer'=>':attribute không hợp lệ',
            'date'=>':attribute không hợp lệ',
        ],[
            'sim.phone'=>'Số điện thoại',
            'sim.iccid'=>'ICCID',
            'sim.price_in'=>'Giá nhập',
            'sim.network_id'=>'Nhà mạng',
            'sim.imported_at'=>'Ngày nhập',
            'sim.expired_at'=>'Ngày hết hạn'
        ]);
        $this->sim->save();
        $this->emitTo('livewire-toast', 'show', 'Cập nhật thành công!');
        $this->emit('reloadData');
        $this->emit('closeModal');
    }


    public function render()
    {
        return view('livewire.edit-sim-modal');
    }
}
