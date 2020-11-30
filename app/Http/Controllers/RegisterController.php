<?php

namespace App\Http\Controllers;

use App\City;
use App\CloudCategory;
use App\Country;
use App\Mail\RegisterCloud\RegisterCloud;
use App\MusicalGenre;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function indexRegister()
    {
        return view('backend.project.submit-project');
    }

    public function storeCloud(Request $request)
    {
        if ($request->valueCreator == '' || $request->valueCreator == 2 || $request->valueCreator == null || $request->valueCreator == 0) {
            $this->registerSimple($request);
        }
        return response()->json('200');
    }

    public function registerSimple($request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6'
        ]);
        $pass = bcrypt($request->password);
        $city = json_decode($request->city);
        $ramdon = Str::random(10);
        $slug = Str::slug($request->name . '-' . $request->last_name . '-' . $ramdon, '-');
        $locale = $request->locale;

        $path = '/images/img-perfil-default.png';

        if ($request->hasFile('picture')) {
            $path = '/storage/' . $request->file('picture')->store('users');
        }

        $registerSimple = new User;
        $registerSimple->name = ucwords($request->name);
        $registerSimple->last_name = ucwords($request->last_name);
        $registerSimple->email = $request->email;
        $registerSimple->phone = $request->phone;
        $registerSimple->picture = $path;
        $registerSimple->city_id = $city->id;
        $registerSimple->slug = $slug;
        $registerSimple->password = $pass;

        $registerSimple->save();

        \Mail::to($registerSimple->email)->locale($locale)->send(new RegisterCloud($registerSimple->name));
    }

    public function getCloudCategories()
    {
        $cloudCategories = CloudCategory::all();
        return response()->json(['data' => $cloudCategories]);
    }

    public function getCloudTags()
    {
        $cloudTags = Tag::all();
        return response()->json(['data' => $cloudTags]);

    }

    public function getCloudMusic()
    {
        $cloudMusic = MusicalGenre::all();
        return response()->json(['data' => $cloudMusic]);

    }

    public function getCloudCountries()
    {
        $cloudCountry = Country::all();
        return response()->json(['data' => $cloudCountry]);

    }

    public function getCloudCities($countryCode)
    {
        $cloudCities = City::where('country_code', $countryCode)->get();
        return response()->json(['data' => $cloudCities]);
    }
}
