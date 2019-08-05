<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\house;
use App\profile;
use App\location;
use App\city;
use App\User;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function show($id)
    {
        $page = 'h';
        if (auth()->check()) {
            if ($id == auth()->id()) {
                $page = 'm';
            }
        }
        $houses=house::where('user_id',$id)->latest()->paginate('10');
        return view('pages/profile', ['user' => User::find($id),'houses'=>$houses,'page'=>$page]);
    }

    public function list($id = 0)
    {
        $req = null;
        if ($id == 0) {
            return view('pages/agents', ['profile' => profile::paginate(21), 'request' => $req]);
        }

    }

    public function edit($id)
    {
        $cities = city::all();
        return view('pages/editprofile', ['user' => User::find($id),'cities'=>$cities]);
    }

    public function del($id)
    {
        $user = App\User::find($id);

        $user->delete();
        return redirect('/');
    }

    public function update(Request $request)
    {
        $this->validate($request, [

            //'photo' => 'required',
            //'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        if ($request->city != null) {
            if ($request->location != null) {
                $location = App\location::firstOrNew(['district' => $request->location], ['city_id' => $request->city]);
                $location->save();
            }
        }

        $profile2 = App\profile::firstOrNew(['user_id' => $request->id]);
        $profile2->save();

        $user = App\User::find($request->id);
        $user->email = $request->email;
        $user->update();

        $profile = App\profile::find($profile2->id);

        if ($request->fname != null) {
            $profile->fname = $request->fname;
        }
        if ($request->lname != null) {
            $profile->lname = $request->lname;
        }
        if ($request->phonenum != null) {
            $profile->phonenum = $request->phonenum;
        }
        if ($request->zip != null) {
            $profile->zip = $request->zip;
        }
        if ($request->comment != null) {
            $profile->comment = $request->comment;
        }

        if ($request->isagent) {
            $profile->isagent = 1;
        } else {
            $profile->isagent = 0;
        }

        if ($request->isbongah) {
            $profile->isbongah = 1;
        } else {
            $profile->isbongah = 0;
        }

        if ($request->city != null) {

            $profile->city_id = $request->city;
        }

        if ($request->location != null) {

            $profile->location_id = $location->id;
        }

        $data = null;

        if ($request->hasfile('photo')) {
            foreach ($request->file('photo') as $image) {
                $name = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move('pic/', $name);
                $data = $name;
            }
            $profile->photo = $data;
        }

        $profile->update();
        return back()->with('message','پروفایل با موفقیت ویرایش شد');


    }
}

