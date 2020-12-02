<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clout extends Model
{


    public function musicalGenres(){
       return $this->belongsToMany(MusicalGenre::class,'clout_musicalgenres','musical_genres_id','clout_id');
    }

    public function tag(){
        return $this->morphToMany(Tag::class,'taggable');
    }

}
