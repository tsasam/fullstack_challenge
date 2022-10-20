<?php

namespace App\Http\Services;

use App\Http\Repositories\OrganismRepository;
use App\Http\Requests\NewOrganismPostRequest;

class OrganismService
{
    private NewOrganismPostRequest $request;
    private OrganismRepository $organismRepository;

    /**
     * @param NewOrganismPostRequest $request
     * @param OrganismRepository $organismRepository
     */
    public function __construct(NewOrganismPostRequest $request, OrganismRepository $organismRepository)
    {
        $this->request = $request;
        $this->organismRepository = $organismRepository;
    }

    /**
     * Call the organism repository
     * @return void
     */
    public function createNewOrganism(): void
    {
         $this->organismRepository->saveNewOrganism($this->request);
    }
}
