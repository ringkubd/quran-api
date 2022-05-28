<?php

namespace App\Repositories;

use App\Models\Pdf;
use App\Repositories\BaseRepository;

/**
 * Class PdfRepository
 * @package App\Repositories
 * @version May 26, 2022, 12:28 pm UTC
*/

class PdfRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sura_no',
        'pdf'
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
        return Pdf::class;
    }
}
