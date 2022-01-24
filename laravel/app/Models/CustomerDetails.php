<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'address',
        'country'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
