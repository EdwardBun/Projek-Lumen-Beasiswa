<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'beasiswa_id' => $this->beasiswa_id,
            'beasiswa' => new BeasiswaResource($this->whenLoaded('beasiswa')),
            'status' => $this->status,
            'waktu_bulan' => $this->waktu_bulan,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
