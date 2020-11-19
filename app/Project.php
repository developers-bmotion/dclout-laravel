<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    const REVISION=1;
    const PUBLICADO=2;
    const ACEPTADO=3;
    const RECHAZADO=4;

    public function tag(){
        $this->morphToMany(Tag::class,'tagable');
    }

}
