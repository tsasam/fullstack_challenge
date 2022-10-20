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

    const ID = 'id';
    const CODE = 'code';
    const CROP_ID = 'crop_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

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
     * @return
     */
    public function crop()
    {
        return $this->belongsTo(Crop::class);
    }

}
