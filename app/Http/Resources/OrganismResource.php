<?php

namespace App\Http\Resources;

use App\Models\Organism;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganismResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            Organism::GENUS => $this[Organism::GENUS],
            Organism::SPECIES => $this[Organism::SPECIES],
            'count' => $this['count']
        ];
    }

}
