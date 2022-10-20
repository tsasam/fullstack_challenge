<?php

namespace App\Http\Controllers;

use App\Http\Resources\SampleResource;
use App\Http\Services\SampleService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SampleController extends Controller
{

    /**
     * Controller that return a list of samples
     * @param SampleService $sampleService
     * @return AnonymousResourceCollection
     */
    public function listSamples(SampleService $sampleService): AnonymousResourceCollection
    {
        $sampleCollection = $sampleService->handle();

        return SampleResource::collection($sampleCollection);
    }
}
