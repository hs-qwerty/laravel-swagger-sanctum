<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    use HasFactory;


    public function getImage()
    {
        return $this->hasMany('App\Models\ImageConnection', 'photographerId');
    }

}
