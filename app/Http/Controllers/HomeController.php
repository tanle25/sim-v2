<?php

namespace App\Http\Controllers;

use App\Models\CustomerRequest;
use App\Models\Invoice;
use App\Models\Sim;
use App\Models\SimOwner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        # code...

        if(Auth::user()->is_admin == 0){
            return redirect('danh-sach-sim');
        }


        $month = Carbon::today()->month;
        $invoices = Invoice::whereMonth('created_at', $month)->orderBy('created_at','ASC')->get()->groupBy(function($item){
            return Carbon::parse($item->created_at)->day;
        });
        $revenue = $invoices->map(function($invoice){
            return $invoice->sum('price_out');
        });
        $lastMonth = Carbon::today()->daysInMonth;
        for ($i=1; $i <=$lastMonth ; $i++) {
            # code...
            if(!isset($revenue[$i])){
                $revenue[$i] = 0;
            }
        }
        $revenue = $revenue->sortKeys() ;
        $start = Carbon::today();
        $stop = Carbon::today()->addDays(5);
        $expired = SimOwner::whereBetween('exprired_at',[$start,$stop])->count();
        $sims = Sim::count();
        $requests = CustomerRequest::where('status',0)->count();
        return view('pages.adnin-dashboard',['revenue'=>$revenue,'sims'=>$sims,'requests'=>$requests,'expired'=>$expired]);
    }
    public function revenue()
    {
        # code...
        return view('pages.revenue-manager');
    }

    public function allRequest()
    {
        # code...
        return view('pages.request-manager');
    }

    public function userRequest()
    {
        # code...
        return view('pages.requested-list');
    }
}
