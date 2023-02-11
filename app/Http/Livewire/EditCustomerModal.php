<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditCustomerModal extends ModalComponent
{
    public $customer;
    protected $rules = [
        'customer.name'=>'required',
        'customer.address'=>'required',
        'customer.facebook'=>'required',


    ];
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
        // dd($this->customer);

    }
    public function submit()
    {
        # code...
        $this->validate([
            'customer.name'=>'required',
            'customer.address'=>'required',
            'customer.facebook'=>'required',
        ],[
            'required'=>':attribute không được để trống'
        ],[
            'customer.name'=>'Họ tên',
            'customer.address'=>'Địa chỉ',
            'customer.facebook'=>'Facebook'
        ]);
        $this->customer->save();
        $this->closeModal();
        $this->emit('reloadCustomer');
        $this->emitTo('livewire-toast', 'show', 'Cập nhật khách hàng thành công!');
    }
    public function render()
    {
        return view('livewire.edit-customer-modal');
    }
}
