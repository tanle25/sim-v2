<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteCustomerModal extends ModalComponent
{
    public $customer;
    public static function modalMaxWidth(): string
    {
        return 'md';
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount($customer)
    {
        # code...
        $this->customer = Customer::find($customer);

    }

    public function submit()
    {
        # code...
        $this->customer->delete();
        $this->closeModal();
        $this->emit('reloadCustomer');
        $this->emitTo('livewire-toast', 'show', 'Xoá khách hàng thành công!');
    }
    public function render()
    {
        return view('livewire.delete-customer-modal');
    }
}
