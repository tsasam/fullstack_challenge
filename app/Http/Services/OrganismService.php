<?php

namespace App\Http\Services;

use App\Http\Repositories\OrganismRepository;
use App\Http\Requests\NewOrganismPostRequest;
use App\Http\Transformers\OrganismTransformer;
use Illuminate\Support\LazyCollection;

class OrganismService
{
    private OrganismRepository $organismRepository;
    private OrganismTransformer $organismTransformer;

    /**
     * @param NewOrganismPostRequest $request
     * @param OrganismRepository $organismRepository
     */
    public function __construct(OrganismRepository $organismRepository, OrganismTransformer $organismTransformer)
    {
        $this->organismRepository = $organismRepository;
        $this->organismTransformer = $organismTransformer;
    }

    /**
     * Call the organism repository
     * @param $request
     * @return void
     */
    public function createNewOrganism($request): void
    {
        $this->organismRepository->saveNewOrganism($request);
    }


    /**
     * Return a list of organisms
     * @return mixed
     */
    public function retrieveOrganisms(): mixed
    {
        return $this->organismRepository->getOrganisms();
    }

    /**
     * Return top 10  of organisms
     * @return LazyCollection
     */
    public function retrieveTop10Organisms(): LazyCollection
    {
        $top10 = $this->organismRepository->getTop10Organisms();

        return $this->organismTransformer->transformTop10Organism($top10);
    }
}
