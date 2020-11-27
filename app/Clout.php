<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clout extends Model
{



    public function tag(){
        $this->morphToMany(Tag::class,'taggable');
    }

}
