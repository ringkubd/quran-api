<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Audio
 * @package App\Models
 * @version May 26, 2022, 12:26 pm UTC
 *
 * @property integer $sura_no
 * @property string $audio
 */
class Audio extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'audio';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'sura_no',
        'audio'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sura_no' => 'integer',
        'audio' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sura_no' => 'required|integer',
        'audio' => 'required|string|max:200',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
