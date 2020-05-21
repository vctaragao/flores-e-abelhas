<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    protected $guarded = [];

    public function bees()
    {
        return $this->belongsToMany('App\Bee');
    }

    public function months()
    {
        return $this->belongsToMany('App\Month');
    }
}
