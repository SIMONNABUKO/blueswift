<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function wmethod()
    {
        return $this->belongsTo('App\Wmethod');
    }
}
