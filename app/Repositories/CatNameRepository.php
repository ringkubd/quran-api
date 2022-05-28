<?php

namespace App\Repositories;

use App\Models\CatName;
use App\Repositories\BaseRepository;

/**
 * Class CatNameRepository
 * @package App\Repositories
 * @version May 26, 2022, 12:28 pm UTC
*/

class CatNameRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'eng',
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
        return CatName::class;
    }
}
