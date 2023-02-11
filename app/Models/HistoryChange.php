<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryChange extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        # code...
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function network()
    {
        # code...
        return $this->hasOne(Network::class,'id','network_id');
    }
}
