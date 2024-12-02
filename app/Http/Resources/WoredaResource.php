<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WoredaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'zone_id' => $this->zone_id,
        ];
    }
}

