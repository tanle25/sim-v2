<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Sim;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class RentSingleModal extends ModalComponent
{
    use WithFileUploads;
    public $customers;
    public $query;
    public $contacts;
    public $highlightIndex;
    public $user;
    public $isShow = false;
    public $sim;
    public $contract;
    public $customer;
    public $image;

    protected $rules =[
        'contract.price_out'=>'required',
        'contract.exprired_at'=>'required',
        'customer.name'=>'required',
        'customer.address'=>'required',
        'customer.facebook'=>'required',

    ];

    public function mount($sim)
    {
        # code...
        $this->customers = Customer::all();
        $this->sim = Sim::find($sim);
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function resetInput()
    {
        $this->query = '';
        $this->contacts = [];
        $this->highlightIndex = 0;
    }

    public function selectedUser($id)
    {
        # code...
        $this->user = Customer::find($id);
        $this->isShow = false;
        $this->query = $this->user->name;
    }


    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->contacts) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->contacts) - 1;
            return;
        }
        $this->highlightIndex--;
    }



    public function updatedQuery()
    {
        $this->contacts = Customer::where('name', 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
        $this->isShow = true;
    }

    public function submit()
    {
        # code...
        $this->validate([
            'user.id'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|required',
            'sim.id'=>'required',
            'sim.status'=>'in:0',
            'sim.network_id'=>'required',
            'sim.price_in'=>'gt:0',
            'contract.price_out'=>'required|numeric',
            'contract.exprired_at'=>'required|date',
        ],[
            'required'=>':attribute không được để trống',
            'numeric'=>':attribute không hợp lệ',
            'date'=>':attribute không hợp lệ',
            'in'=>':attribute không hoạt động',
            'gt'=>':attribute chưa có giá nhập',
            'image'=>':attribute không hợp lệ',
            'mimes'=>':attribute chỉ hỗ trợ định dạng PNG, JPG, JPEG'

        ],[
            'user.id'=>'Khách hàng',
            'sim.id'=>'Sim',
            'contract.price_out'=>'Giá bán',
            'contract.exprired_at'=>'Ngày hết hạn',
            'sim.network_id'=>'Nhà mạng',
            'sim.price_in'=>'Sim',
            'sim.status'=>'Trạng thái',
            'image'=>'Hình ảnh'
        ]);

        $imageUrl = $this->image->store('public/images');

        $this->user->sims()->create([
            'sim_id'=>$this->sim->id,
            'price'=>$this->contract['price_out'],
            'exprired_at'=>$this->contract['exprired_at']
        ]);
        $invoice = $this->user->invoices()->create([
            'sim_id'=>$this->sim->id,
            'price_in'=>$this->sim->price_in,
            'price_out'=>$this->contract['price_out'],
            'rent_at'=>Carbon::today(),
            'exprired_at'=>$this->contract['exprired_at'],
            'type'=>0
        ]);
        $invoice->image()->create([
            'url'=>'storage/images/'.pathinfo($imageUrl,PATHINFO_BASENAME)
        ]);
        $this->emitTo('livewire-toast', 'show', 'Cho thuê sim thành công!');
        $this->emit('reloadData');
        $this->emit('closeModal');
    }

    public function createCustomer()
    {
        # code...
        $this->validate([
            'customer.name'=>'required',
            'customer.address'=>'required',
            'customer.facebook'=>'required',
            'sim.network_id'=>'required',
            'sim.id'=>'required',
            'sim.status'=>'in:0',
            'sim.price_in'=>'gt:0',
            'contract.price_out'=>'required|numeric',
            'contract.exprired_at'=>'required|date',
        ],[
            'required'=>':attribute không được để trống',
            'numeric'=>':attribute không hợp lệ',
            'date'=>':attribute không hợp lệ',
            'in'=>':attribute không hoạt động',
            'gt'=>':attribute chưa có giá nhập'

        ],[
            'sim.id'=>'Sim',
            'contract.price_out'=>'Giá bán',
            'contract.exprired_at'=>'Ngày hết hạn',
            'customer.name'=>'Họ tên',
            'customer.address'=>'Địa chỉ',
            'customer.facebook'=>'Facebook',
            'sim.network_id'=>'Nhà mạng',
            'sim.price_in'=>'Sim',
            'sim.status'=>'Trạng thái'
        ]);

        $customer = Customer::create($this->customer);
        $customer->sims()->create([
            'sim_id'=>$this->sim->id,
            'price'=>$this->contract['price_out'],
            'exprired_at'=>$this->contract['exprired_at']
        ]);
        $customer->invoices()->create([
            'sim_id'=>$this->sim->id,
            'price_in'=>$this->sim->price_in,
            'price_out'=>$this->contract['price_out'],
            'rent_at'=>Carbon::today(),
            'exprired_at'=>$this->contract['exprired_at'],
            'type'=>0
        ]);

        $this->emitTo('livewire-toast', 'show', 'Cho thuê sim thành công!');
        $this->emit('reloadData');
        $this->emit('closeModal');

    }

    public function render()
    {
        return view('livewire.rent-single-modal');
    }
}
