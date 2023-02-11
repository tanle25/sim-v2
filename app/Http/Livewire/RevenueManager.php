<?php

namespace App\Http\Livewire;

use App\Exports\ExportRevenueFilter;
use App\Models\Invoice;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class RevenueManager extends Component
{
    use WithPagination;

    public $start, $stop, $priceIn, $priceOut;
    public $types=[];


    protected $rules = [
        'filter.start'=>'nullable',
        'filter.stop'=>'nullable',
    ];

    // public function updatedFilter()
    // {
    //     # code...
    //     dd($this->filter);
    // }

    public function mount()
    {
        # code...
        $this->start = Carbon::today()->startOfYear()->format('Y-m-d');
        $this->stop = Carbon::today()->endOfDay()->format('Y-m-d');
    }

    public function export()
    {
        # code...
        $colection = Invoice::query();
        $start = Carbon::parse($this->start)->startOfDay();
        $stop = Carbon::parse($this->stop)->endOfDay();
        $colection->whereBetween('rent_at',[$start,$stop]);
        if(count($this->types) == 1){
            $type = $this->types[0];
            $colection->where('type', $type);
        }
        $invoices = $colection->get();
        return Excel::download(new ExportRevenueFilter($invoices),'doanh-thu-'.Carbon::today()->toDateString().'.xlsx');
    }


    public function render()
    {
        $colection = Invoice::query();
        $start = Carbon::parse($this->start)->startOfDay();
        $stop = Carbon::parse($this->stop)->endOfDay();
        $colection->whereBetween('rent_at',[$start,$stop]);
        if(count($this->types) == 1){
            $type = $this->types[0];
            $colection->where('type', $type);
        }
        $this->priceIn = $colection->sum('price_in');
        $this->priceOut = $colection->sum('price_out');

        // dd($this->priceIn);

        $invoices = $colection->paginate(10);
        return view('livewire.revenue-manager',['invoices'=>$invoices]);
    }
}
