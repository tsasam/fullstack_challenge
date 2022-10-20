<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewOrganismPostRequest;
use App\Http\Services\OrganismService;

class OrganismController extends Controller
{
    /**
     * newOrganism controller
     * @param NewOrganismPostRequest $request
     * @param OrganismService $organismService
     * @return void
     */
    public function newOrganism(NewOrganismPostRequest $request, OrganismService $organismService): void
    {
        $organismService->createNewOrganism($request);
    }

    /**
     * newOrganism controller
     * @param OrganismService $organismService
     * @return mixed
     */
    public function organisms(OrganismService $organismService): mixed
    {
       return  $organismService->retrieveOrganisms();
    }
}
