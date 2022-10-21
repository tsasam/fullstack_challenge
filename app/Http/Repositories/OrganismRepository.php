<?php

namespace App\Http\Repositories;

use App\Http\Requests\NewOrganismPostRequest;
use App\Models\Abundance;
use App\Models\Organism;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Collection;
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

    /**
     * Create top 10 of organisms
     * @return array|Collection
     */
    public function getTop10Organisms(): array|Collection
    {
        return Organism::query()
            ->select(
                Organism::TABLE . '.' . Organism::GENUS,
                Organism::TABLE . '.' . Organism::SPECIES,
            )
            ->selectRaw('count (abundances.sample_id) as total_samples')
            ->join(Abundance::TABLE, Abundance::TABLE . '.' . Abundance::ORGANISM_ID,
                '=',
                Organism::TABLE . '.' . Organism::ID
            )
            ->groupBy([Organism::GENUS,Organism::SPECIES ])
            ->orderByDesc('total_samples')
            ->limit(10)
            ->get();
    }


}
