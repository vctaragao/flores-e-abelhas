<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $guarded = [];

    public function flowers()
    {
        return $this->belongsToMany('App\Flower');
    }
}
