<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MusicalGenre extends Model
{
    use HasTranslations;

    protected $translatable =[

        "name",
        "description"
    ];
}
