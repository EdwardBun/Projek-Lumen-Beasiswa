<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

//colletction : format dari resourcesnya//
//Collection -> Resource//

class BeasiswaCollection extends ResourceCollection {
    public function toArray($request) {
        return parent::toArray($request);
    }
}

?>