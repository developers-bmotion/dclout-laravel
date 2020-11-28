<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
{
    use HasTranslations;

    protected $translatable =[
        "name",
        "description"
    ];

    public function clout(){
        return $this->morphedByMany(Clout::class,'taggable');
    }

    public function project(){
        return $this->morphedByMany(Project::class,'taggable');
    }
}
