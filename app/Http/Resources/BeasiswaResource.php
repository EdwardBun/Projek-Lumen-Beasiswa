<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

//resources : mengatur response data ynag akan dihasilkan dari API ini
//Collection -> Resource -> Controller//

class BeasiswaResource extends JsonResource {
    public function toArray($request) {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => strtoupper($this->type),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}


?>