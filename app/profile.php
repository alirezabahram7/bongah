<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function location(){
        return $this->hasOne('App\location','id','location_id');
    }
  
    public function cities(){
        return $this->hasOne('App\city','id','city_id');
    }
}
