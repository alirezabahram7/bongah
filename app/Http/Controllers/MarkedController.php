<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\marked;
use App\house;

class MarkedController extends Controller
{
    //
    public function save($hid){

        auth()->user()->markedHouses()->syncWithoutDetaching([$hid]);
 
	return back();
    }

    public function destroy(house $hid)
{
    	auth()->user()->markedHouses()->detach($hid);
 
	return back();
}

}
