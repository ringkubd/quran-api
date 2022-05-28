<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Tafsir
 * @package App\Models
 * @version May 26, 2022, 12:30 pm UTC
 *
 * @property string $title
 * @property string $content
 * @property integer $sura
 * @property integer $ayat
 * @property string $source
 * @property string $tags
 * @property integer $blog
 */
class Tafsir extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tafsir';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'content',
        'sura',
        'ayat',
        'source',
        'tags',
        'blog'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'content' => 'string',
        'sura' => 'integer',
        'ayat' => 'integer',
        'source' => 'string',
        'tags' => 'string',
        'blog' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:700',
        'content' => 'required|string',
        'sura' => 'required|integer',
        'ayat' => 'required|integer',
        'source' => 'required|string|max:1000',
        'tags' => 'required|string|max:1000',
        'blog' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
