<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;



/**
 * Crop model representation
 */
class Crop extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE;

    public const TABLE = 'crops';

    /**
     * Id of the crop
     * @var string
     */
    const  ID = 'id';

    /**
     * Name of the crop
     * @var string
     */
    const NAME = 'name';


    /**
     * Crop relation with samples
     * @return HasMany
     */
    public function crop(): HasMany
    {
        return $this->hasMany(Sample::class);
    }
}
