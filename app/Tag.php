<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function projects(){
        return $this->morphedByMany(Project::class,'tagable');
    }

    public function clouts(){
        return $this->morphedByMany(Clout::class,'tagable');
    }
}
