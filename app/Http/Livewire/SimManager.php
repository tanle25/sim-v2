<?php

namespace App\Http\Livewire;

use App\Exports\ExportAllSim;
use App\Exports\ExportSelectedSim;
use App\Models\Network;
use App\Models\Sim;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class SimManager extends Component
{
    use WithPagination;

    public $keyword;
    public $sims =[];
    public $perPage = 20;
    public $checkedState = false;
    public $networks;
    public $filterNetworks = [];
    public $filterStatus = [];
    public $filterRent = [];

    protected $listeners = ['reloadData'];




    public function mount()
    {
        # code...
        $this->keyword = '';

        $this->networks = Network::all();
    }


    public function updatedSims()
    {
        # code...
        $this->emit('addSim', $this->sims);
    }

    public function bulkAction()
    {
        # code...
        $this->emit('openModal','rent-multiple-modal',['sim'=>$this->sims]);
    }

    public function reloadData()
    {
        # code...
        $this->render();
    }

    public function bulkUpdate()
    {
        # code...
        $this->emit('openModal','update-multiple-sim-network',['sims'=>$this->sims]);
    }

    public function bulkUpdateInfo()
    {
        # code...
        $this->emit('openModal','update-sim-infor-modal',['sims'=>$this->sims]);
    }

    public function deleteSim($id)
    {
        # code...
        Sim::find($id)->delete();
        $this->emitTo('livewire-toast', 'show', 'Cập nhật thành công!');
        $this->emit('reloadData');
    }


    public function filterQuery()
    {
        # code...

    }


    public function updatedKeyword()
    {
        # code...
        $this->gotoPage(1);
    }



    public function changeStatus($id, $status)
    {
        # code...
        // dd('update');
        $sim = Sim::find($id)->update([
            'status'=>$status
        ]);
    }

    public function exportAll()
    {
        # code...
        return Excel::download(new ExportAllSim, 'export-all.xlsx');
    }

    public function exportSelected()
    {
        # code...
        $collection = Sim::whereIn('id', $this->sims)->get();
        return Excel::download(new ExportSelectedSim($collection), 'export-selected.xlsx');
    }

    public function render()
    {
        $keyword = $this->keyword;
        $collection = DB::table('sims')->where(function($q) use($keyword){
            return $q->where('phone','like',"%$keyword%")
            ->orWhere('iccid','like',"%$keyword%");
        });

        // $collection->where('phone','LIKE',"%{$keyword}%");
        if(count($this->filterNetworks)){
            $collection = $collection->whereIn('network_id', $this->filterNetworks);

        }
        if(count($this->filterStatus)){
            $collection = $collection->whereIn('status', $this->filterStatus);
        }
        if(count($this->filterRent) == 1){
            if($this->filterRent[0] == 1){
                $collection = $collection->whereHas('owner');
            }else{
                $collection = $collection->whereDoesntHave('owner');
            }
        }
        $collection = $collection->get();
        $items = $collection->forPage($this->page, $this->perPage);
        $simCards = new LengthAwarePaginator($items, $collection->count(), $this->perPage, $this->page);

        return view('livewire.sim-manager',['simCards'=>$simCards]);
    }
}
