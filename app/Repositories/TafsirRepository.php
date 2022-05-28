<?php

namespace App\Repositories;

use App\Models\Tafsir;
use App\Repositories\BaseRepository;

/**
 * Class TafsirRepository
 * @package App\Repositories
 * @version May 26, 2022, 12:30 pm UTC
*/

class TafsirRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'content',
        'sura',
        'ayat',
        'source',
        'tags',
        'blog'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tafsir::class;
    }
}
