<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexProfile(){
      return view('frontend.profile.profile-clout');
    }

    public function edit(){

    }

    public function delete(){

    }
}
