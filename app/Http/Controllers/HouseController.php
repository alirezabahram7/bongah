<?php

namespace App\Http\Controllers;


use http\Env\Response;
use Illuminate\Http\Request;
use App;
use App\User;
use App\House;
use App\profile;
use App\location;
use App\city;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{

    public function show($rors)
    {
        $req = null;
        $houses = House::where('RentorSell', $rors)->latest()->paginate(20);
        return view('pages/houses', ['house' => $houses, 'rors' => $rors, 'request' => $req]);
    }

    public function edit($id)
    {
        return view('pages/edithouse', ['house' => house::find($id)]);
    }

    public function create()
    {
        $cities = city::all();
        return view('pages/inserthome', compact('cities'));
    }

    public function del($id)
    {
        $house = App\house::find($id);

        $house->delete();
        return redirect()->route('myhouses.show');
    }

    public function myhouses()
    {

        return view('pages/myhouses', ['house' => House::all()->sortByDesc('created_at')]);
    }

    public function card($id)
    {

        return view('pages/housecard', ['house' => house::find($id)]);
    }

    public function search(Request $request)
    {

        if ($request->state == "agent") {
            return view('pages/agents', ['profile' => profile::latest(), 'request' => $request]);
        }
        if ($request->state == 'buy') {
            $houses = House::where('RentorSell', 1);
            $rors = 1;
        } else {
            $houses = House::where('RentorSell', 0);
            $rors = 0;
        }
        if ($request->srch != null) {
            $srch = $request->srch;
        } elseif ($request->srch1 != null) {
            $srch = $request->srch1;
        } else {
            $srch = null;
        }

        if ($srch != null) {
            $srchArr = explode("  ", $srch);
            $houses = $houses->whereHas('cities', function ($query) use ($srchArr) {
                $query->where(function ($query) use($srchArr) {
                    foreach ($srchArr as $key){
                        $query->orWhere('cities.city', 'like','%'.$key.'%');
                    }});
            })->orWhereHas('location', function ($query) use ($srchArr) {
                $query->whereIn('locations.district', $srchArr);
            })->orWhere(function ($query) use($srchArr) {
                foreach ($srchArr as $key){
                    $query->orWhere('zipcode', 'like',  $key .'%');
                }
            });

        } else {
            $minc = 0;
            $minr = 0;
            $minm = 0;
            $maxc = 999999999999999999;
            $maxr = 999999999999999999;
            $maxm = 999999999999999999;
            if ($request->mincost != null) {
                $minc = $request->mincost;
            }
            if ($request->maxcost != null) {
                $maxc = $request->maxcost;
            }
            if ($request->minrent != null) {
                $minr = $request->minrent;
            }
            if ($request->maxrent != null) {
                $maxr = $request->maxrent;
            }
            if ($request->minmet != null) {
                $minm = $request->minmet;
            }
            if ($request->maxmet != null) {
                $maxm = $request->maxmet;
            }
            $houses = $houses->whereBetween('cost', [$minc, $maxc])->whereBetween('rent',
                [$minr, $maxr])->whereBetween('meterage', [$minm, $maxm]);

            if ($request->type != 'نوع') {
                $type = $request->type;
                $houses = $houses->where('type', $type);
            }

            if ($request->location != null) {
                $location = $request->location;
                $houses = $houses->whereHas('location', function ($query) use ($location) {
                    $query->where('district', $location);
                });
            }

            if ($request->zipcode != null) {
                $zipcode = $request->zipcode;
                $houses = $houses = $houses->where('zipcode','LIKE',$zipcode.'%');
            }
            if ($request->city != 'انتخاب کنید') {
                $city = $request->city;
                $houses = $houses->where('city', $city);
            }
        }

        $houses = $houses->latest()->paginate(10);

        return view('pages/houses', ['house' => $houses, 'rors' => $rors, 'request' => $request]);

    }

    public
    function fav()
    {
        $houses = auth()->user()->markedHouses()->paginate(5);

        return view('pages/favorites', compact('houses'));
    }

    public
    function store(
        Request $request
    ) {
        $house = new House;

        $house->city = $request->city;
        $location = App\location::firstOrNew(['district' => $request->location], ['city_id' => $request->city]);
        $location->save();

        $house->location()->district = $request->location;
        $house->location_id = $location->id;

        $house->user_id = auth()->user()->id;
        $house->build_year = $request->year;
        $house->type = $request->type;
        $house->rooms = $request->rooms;
        $house->floor = $request->floor;
        $house->address = $request->address;
        $house->rooms = $request->rooms;
        $house->zipcode = $request->zip;
        $house->cost = $request->cost;
        $house->meterage = $request->meterage;
        $house->comment = $request->comment;
        $house->lat = $request->lat;
        $house->long = $request->long;

        if (!$request->sell) {
            $house->rent = $request->rentcost;
        } else {
            $house->rent = 0;
        }


        $data = '';
        if ($request->hasfile('photo')) {

            foreach ($request->file('photo') as $file) {
                $name = uniqid() . '.' . $file->getClientOriginalExtension();
                $uname = str_replace(' ', '_', $name);
                $file->move(public_path() . '/pic/', $uname);
                if ($data == '') {
                    $data = $uname;
                } else {
                    $data = $data . ',' . $uname;
                }
            }

            $house->photo = $data;
        }
        if ($request->parking) {
            $house->parking = 1;

        } else {
            $house->parking = 0;
        }

        if ($request->anbari) {
            $house->anbari = 1;

        } else {
            $house->anbari = 0;
        }

        if ($request->elevator) {
            $house->elevator = 1;

        } else {
            $house->elevator = 0;
        }

        if ($request->balcony) {
            $house->balcony = 1;

        } else {
            $house->balcony = 0;
        }

        if (!$request->sell) {
            $house->RentorSell = 0;

        } else {
            $house->RentorSell = 1;
        }


        $house->save();
        //dd($house);
        return redirect('/myhouses')->with('success', 'خانه شما با موفقیت ثبت شد');

    }

    public
    function update(
        Request $request
    ) {
        $this->validate($request, [

            //'photo' => 'required',
            //'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);


        $city = App\city::firstOrNew(['city' => $request->city]);
        $city->save();
        $location = App\location::firstOrNew(['district' => $request->location], ['city_id' => $city->id]);
        $location->save();

        $house = App\house::find($request->id);

        //$house->location['district']=$request->location;
        //$house->cities['city']=$request->city;

        $house->user_id = auth()->user()->id;
        $house->build_year = $request->year;
        $house->type = $request->type;
        $house->rooms = $request->rooms;
        $house->floor = $request->floor;
        $house->address = $request->address;
        $house->rooms = $request->rooms;
        $house->zipcode = $request->zip;
        $house->cost = $request->cost;
        $house->meterage = $request->meterage;
        $house->comment = $request->comment;

        if (!$request->sell) {
            $house->rent = $request->rentcost;
        } else {
            $house->rent = 0;
        }

        $house->city = $city->id;
        $house->location_id = $location->id;

        $data = null;

        if ($request->hasfile('photo')) {

            foreach ($request->file('photo') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/pic/', $name);
                $data[] = 'pic' . $name;
            }
        }


        $house->photo = json_encode($data);


        if ($request->parking) {
            $house->parking = 1;

        } else {
            $house->parking = 0;
        }

        if ($request->anbari) {
            $house->anbari = 1;

        } else {
            $house->anbari = 0;
        }

        if ($request->elevator) {
            $house->elevator = 1;

        } else {
            $house->elevator = 0;
        }

        if ($request->balcony) {
            $house->balcony = 1;

        } else {
            $house->balcony = 0;
        }

        if (!$request->sell) {
            $house->RentorSell = 0;

        } else {
            $house->RentorSell = 1;
        }


        $house->update();
        return redirect()->route('house.card', ['id' => $request->id]);


    }

    public
    function map(
        Request $request
    ) {

        $data = $request->id;
        echo response()->json($data);
        return response()->json($data);

    }

}

