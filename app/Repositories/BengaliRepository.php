<?php

namespace App\Repositories;

use App\Models\Bengali;
use App\Repositories\BaseRepository;

/**
 * Class BengaliRepository
 * @package App\Repositories
 * @version May 26, 2022, 12:27 pm UTC
*/

class BengaliRepository extends BaseRepository
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
        return Bengali::class;
    }
}
