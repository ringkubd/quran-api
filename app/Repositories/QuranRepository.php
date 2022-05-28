<?php

namespace App\Repositories;

use App\Models\Quran;
use App\Repositories\BaseRepository;

/**
 * Class QuranRepository
 * @package App\Repositories
 * @version May 26, 2022, 12:29 pm UTC
*/

class QuranRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sura',
        'verse',
        'ayaht'
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
        return Quran::class;
    }
}
