<?php

namespace App\Http\Repositories;

use App\Models\Organism;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;

class OrganismRepository
{
    /**
     * Create a new organism to the database
     * @param $request
     * @return void
     */
    public function saveNewOrganism($request): void
    {
        $organism = new Organism();
        $organism->{Organism::GENUS} = $request[Organism::GENUS];
        $organism->{Organism::SPECIES} = $request[Organism::SPECIES];
        $organism->{Model::CREATED_AT} = CarbonImmutable::now();
        $organism->{Model::UPDATED_AT} = CarbonImmutable::now();

        $organism->save();
    }
}
