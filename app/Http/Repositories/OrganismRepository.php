<?php

namespace App\Http\Repositories;

use App\Http\Requests\NewOrganismPostRequest;
use App\Models\Organism;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;

class OrganismRepository
{
    /**
     * Create a new organism to the database
     * @param NewOrganismPostRequest $request
     * @return void
     */
    public function saveNewOrganism(NewOrganismPostRequest $request): void
    {
        $organism = new Organism();
        $organism->{Organism::GENUS} = $request[Organism::GENUS];
        $organism->{Organism::SPECIES} = $request[Organism::SPECIES];
        $organism->{Model::CREATED_AT} = CarbonImmutable::now();
        $organism->{Model::UPDATED_AT} = CarbonImmutable::now();

        $organism->save();
    }

    /**
     * Create a new organism to the database
     * @return mixed
     */
    public function getOrganisms(): mixed
    {
        return Organism::paginate(10);
    }
}
