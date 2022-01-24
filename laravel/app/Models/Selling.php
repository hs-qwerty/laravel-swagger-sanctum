<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selling extends Model
{
    use HasFactory;

    protected $table = "sellings";

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

}
