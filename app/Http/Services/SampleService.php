<?php

namespace App\Http\Services;

use App\Http\Repositories\SampleRepository;
use App\Http\Transformers\SampleTransformer;
use Illuminate\Support\LazyCollection;

class SampleService
{
    /**
     * @var SampleRepository
     */
    private SampleRepository $sampleRepository;
    /**
     * @var SampleTransformer
     */
    private SampleTransformer $transformer;

    public function __construct(SampleRepository $sampleRepository, SampleTransformer $transformer)
    {
        $this->sampleRepository = $sampleRepository;
        $this->transformer = $transformer;
    }

    /**
     * @return LazyCollection
     */
    public function handle(): LazyCollection
    {
        $samples =  $this->sampleRepository->getSamples();

        return $this->transformer->transformSamples($samples);
    }
}
