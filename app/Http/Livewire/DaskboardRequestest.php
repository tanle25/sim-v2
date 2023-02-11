<?php

namespace App\Http\Livewire;

use App\Models\CustomerRequest;
use App\Models\Sim;
use App\Models\SimOwner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DaskboardRequestest extends Component
{
    use WithPagination;
    // public $sims;

    public function accept($id)
    {
        # code...
        // $sim =
        DB::beginTransaction();
        try {
            $request = CustomerRequest::find($id);
            $request->update([
                'status'=>1,
                'performed_by'=>Auth::user()->id,
                'performed_at'=>Carbon::now()
            ]);
            $sim = Sim::find($request->sim_id);
            $sim->update([
                'status'=>$request->status_to,
            ]);
            $this->emitTo('livewire-toast', 'show', 'Thêm khách hàng thành công!');
            DB::commit();

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th);
        }

    }
    public function render()
    {
        $requestests = CustomerRequest::where('status',0)->paginate(10);
        // dd($sims);
        return view('livewire.daskboard-requestest',['requestests'=>$requestests]);
    }
}
