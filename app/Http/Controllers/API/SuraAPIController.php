<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSuraAPIRequest;
use App\Http\Requests\API\UpdateSuraAPIRequest;
use App\Models\Sura;
use App\Repositories\SuraRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SuraController
 * @package App\Http\Controllers\API
 */

class SuraAPIController extends AppBaseController
{
    /** @var  SuraRepository */
    private $suraRepository;

    public function __construct(SuraRepository $suraRepo)
    {
        $this->suraRepository = $suraRepo;
    }

    /**
     * Display a listing of the Sura.
     * GET|HEAD /suras
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $suras = $this->suraRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($suras->toArray(), 'Suras retrieved successfully');
    }

    /**
     * Store a newly created Sura in storage.
     * POST /suras
     *
     * @param CreateSuraAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSuraAPIRequest $request)
    {
        $input = $request->all();

        $sura = $this->suraRepository->create($input);

        return $this->sendResponse($sura->toArray(), 'Sura saved successfully');
    }

    /**
     * Display the specified Sura.
     * GET|HEAD /suras/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Sura $sura */
        $sura = $this->suraRepository->find($id);

        if (empty($sura)) {
            return $this->sendError('Sura not found');
        }

        return $this->sendResponse($sura->toArray(), 'Sura retrieved successfully');
    }

    /**
     * Update the specified Sura in storage.
     * PUT/PATCH /suras/{id}
     *
     * @param int $id
     * @param UpdateSuraAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSuraAPIRequest $request)
    {
        $input = $request->all();

        /** @var Sura $sura */
        $sura = $this->suraRepository->find($id);

        if (empty($sura)) {
            return $this->sendError('Sura not found');
        }

        $sura = $this->suraRepository->update($input, $id);

        return $this->sendResponse($sura->toArray(), 'Sura updated successfully');
    }

    /**
     * Remove the specified Sura from storage.
     * DELETE /suras/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Sura $sura */
        $sura = $this->suraRepository->find($id);

        if (empty($sura)) {
            return $this->sendError('Sura not found');
        }

        $sura->delete();

        return $this->sendSuccess('Sura deleted successfully');
    }
}
