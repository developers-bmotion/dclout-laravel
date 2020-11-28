<?php

namespace App\Http\Controllers;

use App\City;
use App\CloudCategory;
use App\Country;
use App\MusicalGenre;
use App\Tag;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function indexRegister()
    {
        return view('backend.project.submit-project');
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

    public function getCloudCities($countryCode){
        $cloudCities = City::where('country_code', $countryCode)->get();
        return response()->json(['data' => $cloudCities]);
    }
}
