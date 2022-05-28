<?php

namespace App\Repositories;

use App\Models\Audio;
use App\Repositories\BaseRepository;

/**
 * Class AudioRepository
 * @package App\Repositories
 * @version May 26, 2022, 12:26 pm UTC
*/

class AudioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sura_no',
        'audio'
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
        return Audio::class;
    }
}
