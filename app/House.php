<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class house extends Model
{
    protected $table = 'houses';
    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function location(){
        return $this->hasOne('App\location','id','location_id');
    }
    public function myloc($loc) {
        return $this->location()->where('district','=', $loc);
    }
    public function cities(){
        return $this->hasOne('App\city','id','city');
    }

    public function favourites()
{
    return $this->morphToMany(User::class, 'marked');
}
 
public function favouritedBy(User $user)
{
	return $this->favourites->contains($user);
}

}
