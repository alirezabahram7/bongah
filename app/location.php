<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    protected $guarded = [];

    public function houses(){
        return $this->hasMany('App\house');
    }
    public function cities(){
        return $this->hasOne('App\city','id','city_id');
    }
}
