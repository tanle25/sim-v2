<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\Sim;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class RentMultipleModal extends ModalComponent
{
    use WithFileUploads;
    public $query;
    public $contacts;
    public $highlightIndex;
    public $user;
    public $isShow = false;
    public $sims, $simIds;
    public $date;
    public $price;
    public $image;

    protected $listeners = ['addSim'];


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
        // $usrs = User::where('is_admin',0)->get();
        $this->resetInput();
        $this->sims = Sim::whereIn('id', $sim)->get();
        $this->simIds = $sim;

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
        $this->user = User::find($id);
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
        $this->contacts = User::where('name', 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
        $this->isShow = true;
    }

    // public function updatedImage($image)
    // {
    //     # code...

    //     // dd($image);
    //     $this->image->store('images');
    // }

    public function submit()
    {
        # code...
        // dd($this->sims);
        $this->validate([
            'sims'=>'required',
            'sims.*.network_id'=>'required',
            'sims.*.status'=>'in:0',
            'user.id'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'date'=>'required|date',
            'price'=>'required'
        ],[
            'required'=>':attribute không được để trống',
            'in'=>':attribute không hoạt động',
            'image'=>':attribute không hợp lệ',
            'mimes'=>':attribute chỉ hỗ trợ định dạng PNG, JPG, JPEG',
            'date'=>':attribute không hợp lệ',

        ],[
            'sims.*.network_id'=>'Nhà mạng',
            'sims.*.status'=>'Trạng thái',
            'sims'=>'Sim',
            'user.id'=>'Đại lý / Cộng tác viên',
            'price'=>'Giá cho thuê',
            'date'=>'Ngày hết hạn',
            'image'=>'Hình ảnh'
        ]);

        $simowner = Sim::whereIn('id', $this->simIds)->whereHas('owner')->get();
        // dd($simowner);
        if($simowner->count() > 0){
            $this->emitTo('livewire-toast', 'showError', 'Một số sim đang cho thuê!');
        }else{
            $imageUrl = $this->image->store('public/images');
            DB::beginTransaction();
            try {
                //code...

                foreach ($this->sims as $sim) {
                    # code...
                    $this->user->sims()->create([
                        'sim_id'=>$sim->id,
                        'price'=>$this->price,
                        'exprired_at'=>$this->date
                    ]);
                    $invoice = $this->user->invoices()->create([
                        'sim_id'=>$sim->id,
                        'rent_at'=>Carbon::today(),
                        'exprired_at'=>$this->date,
                        'price_in'=>$sim->price_in,
                        'price_out'=>$this->price,
                        'type'=>0
                    ]);
                    // dd($invoice);
                    $invoice = Invoice::find($invoice->id);
                    $invoice->image()->create([
                        'url'=>'storage/images/'.pathinfo($imageUrl,PATHINFO_BASENAME)
                    ]);
                }
                DB::commit();
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();
            }
            $this->emitTo('livewire-toast', 'show', 'Cho thuê sim thành công!');
            $this->emit('reloadData');
            $this->emit('closeModal');
        }

    }
    public function render()
    {
        return view('livewire.rent-multiple-modal');
    }
}
