<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * An organism
 * @property string $genus
 * @property string $species
 */
class Organism extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE;

    public const TABLE = 'organisms';


    const ID = 'id';
    const GENUS = 'genus';
    const SPECIES = 'species';
}
