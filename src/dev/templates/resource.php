<?php

namespace NAMESPACEResources;

use Illuminate\Http\Resources\Json\JsonResource;

class NAMEResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,$ELEMENTS
        ];
        return $data;
    }
}
