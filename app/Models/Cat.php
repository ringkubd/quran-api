<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cat
 * @package App\Models
 * @version May 26, 2022, 12:28 pm UTC
 *
 * @property string $sura
 * @property string $aya
 * @property string $cat
 */
class Cat extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cat';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'sura',
        'aya',
        'cat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sura' => 'string',
        'aya' => 'string',
        'cat' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sura' => 'required|string|max:10',
        'aya' => 'required|string|max:10',
        'cat' => 'required|string|max:10',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
