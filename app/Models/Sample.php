<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Sample model representation
 */
class Sample extends Model
{
    use HasFactory;

    /**
     * Relation with abundances
     * @return HasMany
     */
    public function abundances(): HasMany
    {
        return $this->hasMany(Abundance::class);
    }

    /**
     * Relation with crops
     * @return BelongsTo
     */
    public function crop(): BelongsTo
    {
        return $this->belongsTo(Crop::class);
    }

}
