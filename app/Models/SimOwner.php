<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimOwner extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts =[
        'exprired_at'=>'datetime'
    ];

    public function userable()
    {
        # code...
        return $this->morphTo();
    }

    public function getTypeAttribute()
    {
        # code...
        return $this->userable_type =='App\Models\User' ? 'Đại lý' : 'Khách lẻ';
    }

    public function sim()
    {
        # code...
        return $this->hasOne(Sim::class,'id','sim_id');
    }


}
