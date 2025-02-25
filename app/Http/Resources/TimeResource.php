<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'beasiswa_id' => $this->beasiswa_id,
            'beasiswa' => new BeasiswaResource($this->whenLoaded('beasiswa')), // Menampilkan data beasiswa
            'detail_id' => $this->detail_id,
            'detail' => new DetailResource($this->whenLoaded('detail')), // Menampilkan data detail
            'time_plus' => $this->time_plus,
            'time_minus' => $this->time_minus,
        ];
    }
}
