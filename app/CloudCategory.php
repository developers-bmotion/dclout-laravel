<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CloudCategory extends Model
{

    use HasTranslations;
    protected $translatable =[
        "name",
        "description"
    ];

    public function clouts(){
        return $this->hasOne(Clout::class);
    }
}
