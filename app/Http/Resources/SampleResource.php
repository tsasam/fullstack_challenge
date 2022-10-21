<?php

namespace App\Http\Resources;

use App\Models\Abundance;
use App\Models\Crop;
use App\Models\Sample;
use Illuminate\Http\Resources\Json\JsonResource;

class SampleResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            Sample::ID => $this[Sample::ID],
            Sample::CODE =>$this[Sample::CODE],
            Sample::CROP_ID => $this[Sample::CROP_ID],
            Crop::NAME => $this[Crop::NAME],
            Abundance::ABUNDANCES_COUNT => $this[Abundance::ABUNDANCES_COUNT],
            Sample::CREATED_AT => $this[Sample::CREATED_AT],
            Sample::UPDATED_AT => $this[Sample::UPDATED_AT]
        ];
    }

}
