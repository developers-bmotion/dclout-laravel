<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexProfile(){

      return view('frontend.profile.profile-clout');
    }

    public function getUserProfileClout(){
        $user = User::where('id', auth()->user()->id)->with('clouts.categories','clouts.tag', 'clouts.musicalGenres', 'cities.countries', 'projects')->first();

        return response()->json(['data' => $user]);
    }

    public function edit(){

    }

    public function delete(){

    }
}
