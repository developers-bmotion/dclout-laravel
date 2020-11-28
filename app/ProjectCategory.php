<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProjectCategory extends Model
{
    use HasTranslations;
    protected $translatable =[
        "name",
        "description"
    ];

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
