<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{

    use HasTranslations;
    protected $translatable =[

        "name",
        "description"
    ];

    const REVISION=1;
    const PUBLICADO=2;
    const ACEPTADO=3;
    const RECHAZADO=4;

    public function tag(){
        $this->morphToMany(Tag::class,'taggable');
    }



}
