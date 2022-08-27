<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => 'SWAPI - The Star Wars API',
            'id' => $this->id,
            'category' => $this->category,
            'number' => $this->number,
            'detail' => $this->detail,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at

        ];
    }
}
