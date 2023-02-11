<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function dealer()
    {
        # code...
        return view('pages.dealer-manager');
    }

    public function customer()
    {
        # code...
        return view('pages.customer-manager');
    }

    public function admin()
    {
        # code...
        return view('pages.admin-manager');
    }
    public function partner($user)
    {
        # code...
        // dd($user);
        return view('pages.partner-sim',['user'=>$user]);
    }

    public function logout(Request $request)
    {
        # code...
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
