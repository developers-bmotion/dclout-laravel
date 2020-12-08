<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function countries(){
        return $this->hasOne(Country::class,'alpha2Code','country_code');
    }
}
