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
        return view('pages/profile', ['user' => User::find($id)]);
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
        return view('pages/editprofile', ['user' => User::find($id)]);
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
            $city = App\city::firstOrNew(['city' => $request->city]);
            $city->save();

            if ($request->location != null) {
                $location = App\location::firstOrNew(['district' => $request->location], ['city_id' => $city->id]);
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

            $profile->city_id = $city->id;
        }

        if ($request->location != null) {

            $profile->location_id = $location->id;
        }

        $data = null;

        if ($request->hasfile('photo')) {
            foreach ($request->file('photo') as $image) {
                $name = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/pic/', $name);
                $data = $name;
            }
            $profile->photo = $data;
        }

        $profile->photo = json_encode($data);

        $profile->update();
        return redirect()->route('profile.show', ['id' => $request->id]);


    }
}

