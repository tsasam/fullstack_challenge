<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewOrganismPostRequest;
use App\Http\Resources\OrganismResource;
use App\Http\Services\OrganismService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrganismController extends Controller
{

    private OrganismService $organismService;

    public function __construct(OrganismService $organismService)
    {
        $this->organismService = $organismService;
    }

    /**
     * Create a new organism entry in database
     * @param NewOrganismPostRequest $request
     * @return void
     */
    public function newOrganism(NewOrganismPostRequest $request): void
    {
        $this->organismService->createNewOrganism($request);
    }

    /**
     * Returns the  list of organisms
     * @return mixed
     */
    public function organisms(): mixed
    {
        return $this->organismService->retrieveOrganisms();
    }

    /**
     * Returns the top list of organisms
     * @return AnonymousResourceCollection
     */
    public function organismsTop10(): AnonymousResourceCollection
    {
        $top10Collection = $this->organismService->retrieveTop10Organisms();

        return OrganismResource::collection($top10Collection);
    }
}
