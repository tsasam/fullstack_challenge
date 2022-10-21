<?php

namespace Tests\Unit;

use App\Http\Controllers\SampleController;
use App\Http\Repositories\SampleRepository;
use App\Http\Services\SampleService;
use App\Http\Transformers\SampleTransformer;
use Tests\TestCase;

class SamplesTest extends TestCase
{
    /**
     * Test for samples, better to use Mocks...
     * @return void
     */
    public function test_return_a_sample_collection(): void
    {
        $controller = new SampleController();
        $result = $controller->listSamples(new SampleService(new SampleRepository(), new SampleTransformer()));

        $this->assertIsIterable($result);
        $this->assertArrayHasKey('id', $result->collection->first());
    }
}
