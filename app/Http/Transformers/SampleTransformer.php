<?php

namespace App\Http\Transformers;


use App\Models\Abundance;
use App\Models\Crop;
use App\Models\Sample;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\LazyCollection;

class SampleTransformer
{
    /**
     * @param Collection $sampleCollection
     * @return LazyCollection
     */
    public function transformSamples(Collection $sampleCollection): LazyCollection
    {
        return LazyCollection::make(function () use ($sampleCollection) {
            foreach ($sampleCollection as $sample) {
                $sampleName = $sample->crop->name;
                yield [
                    Sample::ID => $sample->id,
                    Sample::CODE => $sample->code,
                    Sample::CROP_ID => $sample->crop_id,
                    Crop::NAME => $sampleName,
                    Abundance::ABUNDANCES_COUNT => $sample->abundances_count,
                    Sample::CREATED_AT => $sample->created_at,
                    Sample::UPDATED_AT => $sample->updated_at
                ];
            }
        });
    }
}
