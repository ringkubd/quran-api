<?php

namespace App\Repositories;

use App\Models\English;
use App\Repositories\BaseRepository;

/**
 * Class EnglishRepository
 * @package App\Repositories
 * @version May 26, 2022, 12:28 pm UTC
*/

class EnglishRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sura',
        'aya',
        'text'
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
        return English::class;
    }
}
