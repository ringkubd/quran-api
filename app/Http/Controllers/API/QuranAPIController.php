<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateQuranAPIRequest;
use App\Http\Requests\API\UpdateQuranAPIRequest;
use App\Models\Quran;
use App\Repositories\QuranRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class QuranController
 * @package App\Http\Controllers\API
 */

class QuranAPIController extends AppBaseController
{
    /** @var  QuranRepository */
    private $quranRepository;

    public function __construct(QuranRepository $quranRepo)
    {
        $this->quranRepository = $quranRepo;
    }

    /**
     * Display a listing of the Quran.
     * GET|HEAD /qurans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $qurans = $this->quranRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($qurans->toArray(), 'Qurans retrieved successfully');
    }

    /**
     * Store a newly created Quran in storage.
     * POST /qurans
     *
     * @param CreateQuranAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateQuranAPIRequest $request)
    {
        $input = $request->all();

        $quran = $this->quranRepository->create($input);

        return $this->sendResponse($quran->toArray(), 'Quran saved successfully');
    }

    /**
     * Display the specified Quran.
     * GET|HEAD /qurans/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Quran $quran */
        $quran = $this->quranRepository->find($id);

        if (empty($quran)) {
            return $this->sendError('Quran not found');
        }

        return $this->sendResponse($quran->toArray(), 'Quran retrieved successfully');
    }

    /**
     * Update the specified Quran in storage.
     * PUT/PATCH /qurans/{id}
     *
     * @param int $id
     * @param UpdateQuranAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuranAPIRequest $request)
    {
        $input = $request->all();

        /** @var Quran $quran */
        $quran = $this->quranRepository->find($id);

        if (empty($quran)) {
            return $this->sendError('Quran not found');
        }

        $quran = $this->quranRepository->update($input, $id);

        return $this->sendResponse($quran->toArray(), 'Quran updated successfully');
    }

    /**
     * Remove the specified Quran from storage.
     * DELETE /qurans/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Quran $quran */
        $quran = $this->quranRepository->find($id);

        if (empty($quran)) {
            return $this->sendError('Quran not found');
        }

        $quran->delete();

        return $this->sendSuccess('Quran deleted successfully');
    }
}
