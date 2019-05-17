<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App;
use App\User;
use App\house;
use App\profile;
use App\location;
use App\city;
use App\Http\Controllers\Controller;

class HouseController extends Controller
{
    //
    public function show($rors){
        $req=null;
        return view('pages/houses', ['house' => house::all(),'rors'=>$rors,'request'=>$req]);
    }

    public function edit($id){
        return view('pages/edithouse', ['house' => house::find($id)]);
    }
    
    public function del($id){
        $house = App\house::find($id);

        $house->delete();
        return redirect()->route('myhouses.show');
    }

    public function myhouses(){
        
        return view('pages/myhouses', ['house' => house::all()]);
    }
    public function card($id){
        
        return view('pages/housecard', ['house' => house::find($id)]);
    }

    public function search(Request $request){
        
        if($request->state=='buy'){
          return view('pages/houses', ['house' =>house::all(),'rors'=>1,'request'=>$request]);
    
        }

        
        if($request->state=='rent'){
            return view('pages/houses', ['house' => house::all(),'rors'=>0,'request'=>$request]);
        }
        if($request->state=='agent'){
            return view('pages/agents', ['profile' => profile::all(),'request'=>$request]);
        }
        
    }

    public function fav()
    {
        $houses = auth()->user()->markedHouses()->paginate(5);
 
	    return view('pages/favorites', compact('houses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            //'photo' => 'required',
            //'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

    ]);
       
        
        $city=App\city::firstOrNew(['city'=>$request->city]);
        $city->save();
        $location=App\location::firstOrNew(['district'=>$request->location],['city_id'=>$city->id]);
        $location->save();

        $house = new house;

        //$house->location['district']=$request->location;
        //$house->cities['city']=$request->city;

        $house->user_id =auth()->user()->id;
        $house->build_year=$request->year;
        $house->type=$request->type;
        $house->rooms=$request->rooms;
        $house->floor=$request->floor;
        $house->address=$request->address;
        $house->rooms=$request->rooms;
        $house->zipcode=$request->zip;
        $house->cost=$request->cost;
        $house->meterage=$request->meterage;
        $house->comment=$request->comment;

        if(!$request->sell)
        {
            $house->rent=$request->rentcost;
        }
        else{
            $house->rent=0;
        }
        
        $house->city=$city->id;
        $house->location_id=$location->id;
       
        
        if($request->hasfile('photo'))
        {

           foreach($request->file('photo') as $image)
           {
               $name=$image->getClientOriginalName();
               $image->move(public_path().'/pic/', $name);  
               $data[] =$name;  
           }
        }

        
        $house->photo=json_encode($data);
        
       
  
       
        if($request->parking)
        {
            $house->parking=1;

        }
        else{
            $house->parking=0;
        }

        if($request->anbari)
        {
            $house->anbari=1;

        }
        else{
            $house->anbari=0;
        }

        if($request->elevator)
        {
            $house->elevator=1;

        }
        else{
            $house->elevator=0;
        }

        if($request->balcony)
        {
            $house->balcony=1;

        }
        else{
            $house->balcony=0;
        }

        if(!$request->sell)
        {
            $house->RentorSell=0;

        }
        else{
            $house->RentorSell=1;
        }



        $house->save();
        return back()->with('success', 'Your images has been successfully added');

    }

    public function update(Request $request)
    {
        $this->validate($request, [

            //'photo' => 'required',
            //'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

    ]);
       
        
        $city=App\city::firstOrNew(['city'=>$request->city]);
        $city->save();
        $location=App\location::firstOrNew(['district'=>$request->location],['city_id'=>$city->id]);
        $location->save();

        $house = App\house::find($request->id);

        //$house->location['district']=$request->location;
        //$house->cities['city']=$request->city;

        $house->user_id =auth()->user()->id;
        $house->build_year=$request->year;
        $house->type=$request->type;
        $house->rooms=$request->rooms;
        $house->floor=$request->floor;
        $house->address=$request->address;
        $house->rooms=$request->rooms;
        $house->zipcode=$request->zip;
        $house->cost=$request->cost;
        $house->meterage=$request->meterage;
        $house->comment=$request->comment;

        if(!$request->sell)
        {
            $house->rent=$request->rentcost;
        }
        else{
            $house->rent=0;
        }
        
        $house->city=$city->id;
        $house->location_id=$location->id;
       
        $data=null;
        
        if($request->hasfile('photo'))
        {

           foreach($request->file('photo') as $image)
           {
               $name=$image->getClientOriginalName();
               $image->move(public_path().'/pic/', $name);  
               $data[] ='pic'.$name;  
           }
        }

        
        $house->photo=json_encode($data);
        
       
  
       
        if($request->parking)
        {
            $house->parking=1;

        }
        else{
            $house->parking=0;
        }

        if($request->anbari)
        {
            $house->anbari=1;

        }
        else{
            $house->anbari=0;
        }

        if($request->elevator)
        {
            $house->elevator=1;

        }
        else{
            $house->elevator=0;
        }

        if($request->balcony)
        {
            $house->balcony=1;

        }
        else{
            $house->balcony=0;
        }

        if(!$request->sell)
        {
            $house->RentorSell=0;

        }
        else{
            $house->RentorSell=1;
        }



        $house->update();
        return redirect()->route('house.card', ['id' =>$request->id]);
        

    }
 
    public function map(Request $request)
   {

$data= $request->id;
  echo response()->json($data);
     return response()->json($data);

  }
 
}

