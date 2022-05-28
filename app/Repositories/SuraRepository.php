<?php

namespace App\Repositories;

use App\Models\Sura;
use App\Repositories\BaseRepository;

/**
 * Class SuraRepository
 * @package App\Repositories
 * @version May 26, 2022, 12:29 pm UTC
*/

class SuraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Sura::class;
    }
}
