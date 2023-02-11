<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sim extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];


    public static function boot()
    {
        parent::boot();

        static::deleting(function ($sim) {
            // $_sim = $sim;
            // $_sim->user_id = Auth::user()->id;
            // $sim->histories()->create($_sim->toArray());
            $sim->deleted_by = Auth::user()->id;
            $sim->save();
        });

        static::restoring(function($sim){
            $sim->deleted_by = null;
        });

        static::updating(function($sim){
            $sim->histories()->create([
                'user_id'=>Auth::user()->id,
                'phone'=>$sim->phone,
                'iccid'=>$sim->iccid,
                'price_in'=>$sim->price_in,
                'price_out'=>$sim->price_out,
                'network_id'=>$sim->network_id,
                'imported_at'=>$sim->imported_at,
                'expired_at'=>$sim->expired_at,
                'deleted_at'=>$sim->deleted_at,
                'status'=>$sim->status
            ]);
        });
    }

    public function invoices()
    {
        # code...
        return $this->hasMany(Invoice::class);
    }

    public function invoice()
    {
        # code...
        return $this->hasOne(Invoice::class)->latest();
    }


    public function owner()
    {
        # code...
        return $this->hasOne(SimOwner::class,'sim_id','id');
    }


    public function histories()
    {
        # code...
        return $this->hasMany(HistoryChange::class);
    }

    public function history()
    {
        # code...
        return $this->hasOne(HistoryChange::class,'sim_id','id')->latest();
    }

    public function network()
    {
        # code...
        return $this->hasOne(Network::class,'id','network_id');
    }

    public function request()
    {
        # code...
        return $this->hasMany(CustomerRequest::class,'sim_id','id');
    }

    public function performed()
    {
        # code...
        return $this->hasOne(User::class,'id','deleted_by');
    }


}
