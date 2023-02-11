<?php

namespace App\Http\Controllers;

use App\Models\Sim;
use App\Models\User;
use Illuminate\Http\Request;

class SimController extends Controller
{
    //

    public function index()
    {
        # code...
        return view('pages.sim-manager');
    }

    public function history(Sim $sim)
    {
        # code...
        return view('pages.history-change',['sim'=>$sim]);

    }

    public function cancelSim()
    {
        # code...
        return view('pages.cancel-sim');
    }

    public function histories()
    {
        # code...
        return view('pages.history-change-all');
    }

    public function deletedSim()
    {
        # code...
        return view('pages.deleted-sim');
    }

    public function network()
    {
        # code...
        return view('pages.network-manager');
    }
}
