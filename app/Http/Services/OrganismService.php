<?php

namespace App\Http\Services;

use App\Http\Repositories\OrganismRepository;
use App\Http\Requests\NewOrganismPostRequest;

class OrganismService
{
    private OrganismRepository $organismRepository;

    /**
     * @param NewOrganismPostRequest $request
     * @param OrganismRepository $organismRepository
     */
    public function __construct( OrganismRepository $organismRepository)
    {
        $this->organismRepository = $organismRepository;
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
        return  $this->organismRepository->getOrganisms();
    }
}
