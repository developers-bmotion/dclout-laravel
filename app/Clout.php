<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clout extends Model
{


    public function musicalGenres(){
       return $this->belongsToMany(MusicalGenre::class,'clout_musicalgenres','clout_id','musical_genres_id');
    }

    public function tag(){
        return $this->morphToMany(Tag::class,'taggable');
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsTo(CloudCategory::class, 'clout_category_id');
    }

}
