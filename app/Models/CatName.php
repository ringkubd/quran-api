<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CatName
 * @package App\Models
 * @version May 26, 2022, 12:28 pm UTC
 *
 * @property string $name
 * @property string $eng
 * @property string $hindi
 */
class CatName extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cat_name';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'eng',
        'hindi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'eng' => 'string',
        'hindi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:200',
        'eng' => 'required|string|max:100',
        'hindi' => 'required|string|max:200',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
