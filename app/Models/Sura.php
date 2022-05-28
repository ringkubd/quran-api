<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Sura
 * @package App\Models
 * @version May 26, 2022, 12:29 pm UTC
 *
 * @property integer $sura_no
 * @property string $sura_name
 * @property integer $para
 * @property string $meaning
 * @property integer $total_ayat
 * @property integer $total_ruku
 * @property string $eng_name
 * @property string $hindi
 */
class Sura extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'sura';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'sura_no',
        'sura_name',
        'para',
        'meaning',
        'total_ayat',
        'total_ruku',
        'eng_name',
        'hindi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sura_no' => 'integer',
        'sura_name' => 'string',
        'para' => 'integer',
        'meaning' => 'string',
        'total_ayat' => 'integer',
        'total_ruku' => 'integer',
        'eng_name' => 'string',
        'hindi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sura_no' => 'required|integer',
        'sura_name' => 'required|string|max:200',
        'para' => 'required|integer',
        'meaning' => 'required|string|max:20',
        'total_ayat' => 'required|integer',
        'total_ruku' => 'required|integer',
        'eng_name' => 'required|string|max:100',
        'hindi' => 'required|string|max:200',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
