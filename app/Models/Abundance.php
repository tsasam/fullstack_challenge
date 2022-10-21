<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * The abundance that connects a sample with an organism
 * @property int $num
 * @property Sample $sample
 * @property Organism $organism
 */
class Abundance extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE;

    public const TABLE = 'abundances';

    const ABUNDANCES_COUNT = 'abundances_count';
    const ORGANISM_ID = 'organism_id';
    const SAMPLE_ID = 'sample_id';

    public function sample(){
        return $this->belongsTo(Sample::class);
    }

    public function organism(){
        return $this->belongsTo(Organism::class);
    }

}
