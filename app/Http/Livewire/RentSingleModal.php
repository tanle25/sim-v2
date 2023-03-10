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
            'required'=>':attribute kh??ng ???????c ????? tr???ng',
            'numeric'=>':attribute kh??ng h???p l???',
            'date'=>':attribute kh??ng h???p l???',
            'in'=>':attribute kh??ng ho???t ?????ng',
            'gt'=>':attribute ch??a c?? gi?? nh???p',
            'image'=>':attribute kh??ng h???p l???',
            'mimes'=>':attribute ch??? h??? tr??? ?????nh d???ng PNG, JPG, JPEG'

        ],[
            'user.id'=>'Kh??ch h??ng',
            'sim.id'=>'Sim',
            'contract.price_out'=>'Gi?? b??n',
            'contract.exprired_at'=>'Ng??y h???t h???n',
            'sim.network_id'=>'Nh?? m???ng',
            'sim.price_in'=>'Sim',
            'sim.status'=>'Tr???ng th??i',
            'image'=>'H??nh ???nh'
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
        $this->emitTo('livewire-toast', 'show', 'Cho thu?? sim th??nh c??ng!');
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
            'required'=>':attribute kh??ng ???????c ????? tr???ng',
            'numeric'=>':attribute kh??ng h???p l???',
            'date'=>':attribute kh??ng h???p l???',
            'in'=>':attribute kh??ng ho???t ?????ng',
            'gt'=>':attribute ch??a c?? gi?? nh???p'

        ],[
            'sim.id'=>'Sim',
            'contract.price_out'=>'Gi?? b??n',
            'contract.exprired_at'=>'Ng??y h???t h???n',
            'customer.name'=>'H??? t??n',
            'customer.address'=>'?????a ch???',
            'customer.facebook'=>'Facebook',
            'sim.network_id'=>'Nh?? m???ng',
            'sim.price_in'=>'Sim',
            'sim.status'=>'Tr???ng th??i'
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

        $this->emitTo('livewire-toast', 'show', 'Cho thu?? sim th??nh c??ng!');
        $this->emit('reloadData');
        $this->emit('closeModal');

    }

    public function render()
    {
        return view('livewire.rent-single-modal');
    }
}
