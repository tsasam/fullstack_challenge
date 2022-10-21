<?php

namespace App\Http\Transformers;

use App\Models\Crop;
use App\Models\Organism;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\LazyCollection;

class OrganismTransformer
{
    /**
     * Transform the collection received from database
     * @param Collection $top10OrganismCollection
     * @return LazyCollection
     */
    public function transformTop10Organism(Collection $top10OrganismCollection): LazyCollection
    {
        return LazyCollection::make(function () use ($top10OrganismCollection) {
            foreach ($top10OrganismCollection as $top10) {
                yield [
                    Organism::GENUS => $top10->genus,
                    Organism::SPECIES => $top10->species,
                    'count' => $top10->total_samples,
                    Crop::NAME => $top10
                ];
            }
        });
    }
}
