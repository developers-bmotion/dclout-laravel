<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = ['name', 'description', 'updated_at','created_at'];
    protected $table = 'genders';
}
