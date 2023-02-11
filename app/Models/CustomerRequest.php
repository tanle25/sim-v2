<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerRequest extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'performed_at'=>'datetime'
    ];

    public function sim()
    {
        # code...
        return $this->hasOne(Sim::class,'id','sim_id');
    }

    public function user()
    {
        # code...
        return $this->hasOne(User::class,'id','user_id');
    }

    public function performed()
    {
        # code...
        return $this->hasOne(User::class,'id','performed_by');
    }
}
