<?php

namespace App\Repositories;

use App\Models\Cat;
use App\Repositories\BaseRepository;

/**
 * Class CatRepository
 * @package App\Repositories
 * @version May 26, 2022, 12:28 pm UTC
*/

class CatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sura',
        'aya',
        'cat'
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
        return Cat::class;
    }
}
