<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Variation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'variation_category' => $this->variation_category
        ];
    }
}
