<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bee extends Model
{
    protected $guarded = [];

    public function flowers()
    {
        return $this->belongsToMany('App\Flower');
    }
}
