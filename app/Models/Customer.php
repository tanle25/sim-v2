<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    function sims()
    {
        # code...
        return $this->morphMany(SimOwner::class,'userable');
    }

    public function invoices()
    {
        # code...
        return $this->morphMany(Invoice::class,'invoiceable');
    }
}
