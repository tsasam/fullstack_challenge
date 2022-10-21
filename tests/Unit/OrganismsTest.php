<?php

namespace Tests\Unit;

use App\Http\Controllers\OrganismController;
use App\Http\Repositories\OrganismRepository;
use App\Http\Services\OrganismService;
use App\Http\Transformers\OrganismTransformer;
use Tests\TestCase;

class OrganismsTest extends TestCase
{

    /**
     * Test for organisms, better to use Mock...
     * @return void
     */
    public function test_return_an_organism_collection(): void
    {
        $controller = new OrganismController(new OrganismService(new OrganismRepository(), new OrganismTransformer()));
        $result = $controller->organisms();


        $this->assertIsIterable($result);
        $this->assertArrayHasKey('id', $result->first());
    }

    /**
     * Test for organisms, better to use Mock...
     * @return void
     */
    public function test_return_top_10_organism_collection(): void
    {
        $controller = new OrganismController(new OrganismService(new OrganismRepository(), new OrganismTransformer()));
        $result = $controller->organismsTop10();


        $this->assertIsIterable($result);
        $this->assertArrayHasKey('count', $result->collection->first());
    }
}
