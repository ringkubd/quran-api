<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTafsirAPIRequest;
use App\Http\Requests\API\UpdateTafsirAPIRequest;
use App\Models\Tafsir;
use App\Repositories\TafsirRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TafsirController
 * @package App\Http\Controllers\API
 */

class TafsirAPIController extends AppBaseController
{
    /** @var  TafsirRepository */
    private $tafsirRepository;

    public function __construct(TafsirRepository $tafsirRepo)
    {
        $this->tafsirRepository = $tafsirRepo;
    }

    /**
     * Display a listing of the Tafsir.
     * GET|HEAD /tafsirs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tafsirs = $this->tafsirRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tafsirs->toArray(), 'Tafsirs retrieved successfully');
    }

    /**
     * Store a newly created Tafsir in storage.
     * POST /tafsirs
     *
     * @param CreateTafsirAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTafsirAPIRequest $request)
    {
        $input = $request->all();

        $tafsir = $this->tafsirRepository->create($input);

        return $this->sendResponse($tafsir->toArray(), 'Tafsir saved successfully');
    }

    /**
     * Display the specified Tafsir.
     * GET|HEAD /tafsirs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tafsir $tafsir */
        $tafsir = $this->tafsirRepository->find($id);

        if (empty($tafsir)) {
            return $this->sendError('Tafsir not found');
        }

        return $this->sendResponse($tafsir->toArray(), 'Tafsir retrieved successfully');
    }

    /**
     * Update the specified Tafsir in storage.
     * PUT/PATCH /tafsirs/{id}
     *
     * @param int $id
     * @param UpdateTafsirAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTafsirAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tafsir $tafsir */
        $tafsir = $this->tafsirRepository->find($id);

        if (empty($tafsir)) {
            return $this->sendError('Tafsir not found');
        }

        $tafsir = $this->tafsirRepository->update($input, $id);

        return $this->sendResponse($tafsir->toArray(), 'Tafsir updated successfully');
    }

    /**
     * Remove the specified Tafsir from storage.
     * DELETE /tafsirs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tafsir $tafsir */
        $tafsir = $this->tafsirRepository->find($id);

        if (empty($tafsir)) {
            return $this->sendError('Tafsir not found');
        }

        $tafsir->delete();

        return $this->sendSuccess('Tafsir deleted successfully');
    }
}
