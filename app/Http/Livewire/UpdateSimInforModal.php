<?php

namespace App\Http\Livewire;

use App\Models\Sim;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class UpdateSimInforModal extends ModalComponent
{
    public $sims;

    public $info;

    protected $rules = [
        'info.price_in'=>'required',
        'info.imported_at'=>'nullable',
        'info.expired_at'=>'nullable',
    ];

    public function mount($sims)
    {
        # code...
        $this->sims = $sims;
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
        $this->validate([
            'info.price_in'=>'required|integer|min:0',
            'info.imported_at'=>'nullable|date',
            'info.expired_at'=>'nullable|date',
        ],[
            'required'=>':attribute không được để trống',
            'integer'=>':attribute không hợp lệ',
            'date'=>':attribute không hợp lệ',
        ],[
            'info.price_in'=>'Giá nhập vào',
            'info.imported_at'=>'Ngày nhập',
        ]);

        Sim::whereIn('id', $this->sims)->update($this->info);

        $this->emitTo('livewire-toast', 'show', 'Cập nhật thành công!');
        $this->emit('reloadData');
        $this->emit('closeModal');
    }


    public function render()
    {
        return view('livewire.update-sim-infor-modal');
    }
}
