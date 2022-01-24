<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmerDetails extends Model
{
    use HasFactory;


    protected $fillable = [
        'ip',
        'address',
        'country'
    ];


    public function farmers()
    {
        return $this->belongsTo('App\Models\Farmer');
    }


}
