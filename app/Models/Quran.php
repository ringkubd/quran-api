<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Quran
 * @package App\Models
 * @version May 26, 2022, 12:29 pm UTC
 *
 * @property integer $sura
 * @property integer $verse
 * @property string $ayaht
 */
class Quran extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'quranar';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'sura',
        'verse',
        'ayaht'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sura' => 'integer',
        'verse' => 'integer',
        'ayaht' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sura' => 'required|integer',
        'verse' => 'required|integer',
        'ayaht' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
