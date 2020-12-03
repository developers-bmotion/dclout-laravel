<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{

    use HasTranslations;
    const IMAGES_PATH = 'images-projects';

    protected $fillable = [
      "name", "description", "link", "end_time", "user_id", "project_category_id"
    ];

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

    public function category(){
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function imagePath(){
        return asset(sprintf('storage/%s', $this->getTranslation("image", app()->getLocale())));
    }

}
