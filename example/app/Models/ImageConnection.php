<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;


class ImageConnection extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['photographerId','name','description','url','photoId','first_name','last_name','category','order'];



    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'category' => $this->category,

        ];
    }


    public function photographer()
    {

        return $this->belongsTo('App\Models\Photographer', 'id');
    }
}
