<?php

namespace App\Http\Controllers;

use App\City;
use App\CloudCategory;
use App\Clout;
use App\Country;
use App\Mail\RegisterCloud\RegisterCloud;
use App\MusicalGenre;
use App\Project;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function indexRegister()
    {
        return view('frontend.register.submit-register');
    }


    public function storeClout(Request $request)
    {

        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
            'email' => 'required|email|unique:users,email'
        ]);
        $pass = bcrypt($request->password);
        $city = json_decode($request->city);
        $ramdon = Str::random(10);
        $slug = Str::slug($request->name . '-' . $request->last_name . '-' . $ramdon, '-');
        $language = $request->language;

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

        \Mail::to($registerSimple->email)->locale($language)->send(new RegisterCloud($registerSimple->name));

        if ($request->valueCreator == 1) {
            $this->registerClout($request, $registerSimple);
        }
        if ($request->valueCreateProject == 1){

            $this->registerCloutProject($request, $registerSimple);
        }

        if ($request->valueCreator == 1 || $request->valueCreateProject == 1){
            if(Auth::attempt(['email' => $registerSimple->email, 'password' => $pass])){
                $user = Auth::user();
                $username = $user->name;
                return response()->json([
                    'status'   => 'success',
                    'user' => $username,
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'user'   => 'Unauthorized Access'
                ]);
            }
        }
    }

    public function registerClout($request, $user)
    {

        $category = json_decode($request->category_cloud);
        $tag = json_decode($request->tag_cloud);
        $music = json_decode($request->music_cloud);

        $cloutUser = new Clout;
        $cloutUser->user_id = $user->id;
        $cloutUser->clout_category_id = $category->id;
        $cloutUser->save();

        foreach ($music as $musics){
            $cloutUser->musicalGenres()->attach($musics->id);
        }
        foreach ($tag as $tags){
            $cloutUser->tag()->attach($tags->id);
        }
        User::where('id', $user->id)->update([
            'url_facebook' => $request->url_facebook,
            'url_youtube' => $request->url_youtube,
            'url_instagram' => $request->url_instagram,
            'url_tiktok' => $request->url_tiktok,
            'url_twitter' => $request->url_twitter,
            'url_twitch' => $request->url_twitch,
            'url_spotify' => $request->url_spotify,
            'url_apple_music' => $request->url_applemusic,
            'web_site' => $request->url_website
        ]);
    }

    public function registerCloutProject($request, $user){


        $project = new Project;
        $project->user_id = $user->id;
        $project->link = $request->url_project;
        $project->description_short = $request->description_project;
        $project->name_initial = $request->name_initial;
        $project->save();

    }

    public function getCloutCategories()
    {
        $cloudCategories = CloudCategory::all();
        return response()->json(['data' => $cloudCategories]);
    }

    public function getCloutTags()
    {
        $cloudTags = Tag::all();
        return response()->json(['data' => $cloudTags]);

    }

    public function getCloutMusic()
    {
        $cloudMusic = MusicalGenre::all();
        return response()->json(['data' => $cloudMusic]);

    }

    public function getCloutCountries()
    {
        $cloudCountry = Country::all();
        return response()->json(['data' => $cloudCountry]);

    }

    public function getCloutCities($countryCode)
    {
        $cloudCities = City::where('country_code', $countryCode)->get();
        return response()->json(['data' => $cloudCities]);
    }
}
