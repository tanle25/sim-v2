<?php

namespace App\Http\Livewire;

use App\Models\Sim;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CustomerInfomationModal extends ModalComponent
{
    public $sim, $invoice, $owner;

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
    public function mount($id)
    {
        # code...
        $sim = Sim::find($id);
        $this->invoice = $sim->invoice;
        $this->owner = $sim->owner;
        $this->sim = $sim;

    }
    public function render()
    {

        return view('livewire.customer-infomation-modal');
    }
}
