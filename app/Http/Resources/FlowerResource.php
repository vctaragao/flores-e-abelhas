<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FlowerResource extends JsonResource
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
            'name'  => $this->name,
            'image' => asset($this->image),
            'description'   => $this->description,
            'bees'  => $this->bees,
            'months'    => $this->months
        ];
    }
}
