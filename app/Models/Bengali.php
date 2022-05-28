<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Bengali
 * @package App\Models
 * @version May 26, 2022, 12:27 pm UTC
 *
 * @property integer $sura
 * @property integer $aya
 * @property string $text
 */
class Bengali extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bn_bengali';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'sura',
        'aya',
        'text'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sura' => 'integer',
        'aya' => 'integer',
        'text' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sura' => 'required|integer',
        'aya' => 'required|integer',
        'text' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
