<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $guarded = [];
    
    public function houses(){
        return $this->hasMany('App\house','city');
    }
}
