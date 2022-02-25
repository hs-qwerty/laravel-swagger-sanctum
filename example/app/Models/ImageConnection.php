<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageConnection extends Model
{
    use HasFactory;


    protected $fillable = ['name','url','photoId','first_name','last_name'];
}
