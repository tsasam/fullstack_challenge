<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\SampleRepositoryInterface;
use App\Models\Sample;
use Illuminate\Database\Eloquent\Collection;

class SampleRepository implements SampleRepositoryInterface
{

    /**
     * Query to retrieve the samples
     * @return Collection
     */
    public function getSamples(): Collection
    {
         return Sample::query()
            ->withCount('abundances')
            ->with('crop')
            ->get();
    }
}
