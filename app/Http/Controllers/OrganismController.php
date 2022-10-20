<?php

namespace App\Http\Controllers;

use App\Http\Services\OrganismService;

class OrganismController extends Controller
{
    /**
     * newOrganism controller
     * @param OrganismService $organismService
     * @return void
     */
    public function newOrganism(OrganismService $organismService): void
    {
        $organismService->createNewOrganism();
    }
}
