<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function invoiceable()
    {
        # code...
        return $this->morphTo();
    }

    public function sim()
    {
        # code...
        return $this->hasOne(Sim::class,'id','sim_id');
    }

    public function image()
    {
        # code...
        return $this->morphOne(Image::class,'imageable');
    }
}
