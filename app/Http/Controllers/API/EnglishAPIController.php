<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEnglishAPIRequest;
use App\Http\Requests\API\UpdateEnglishAPIRequest;
use App\Models\English;
use App\Repositories\EnglishRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EnglishController
 * @package App\Http\Controllers\API
 */

class EnglishAPIController extends AppBaseController
{
    /** @var  EnglishRepository */
    private $englishRepository;

    public function __construct(EnglishRepository $englishRepo)
    {
        $this->englishRepository = $englishRepo;
    }

    /**
     * Display a listing of the English.
     * GET|HEAD /englishes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $englishes = $this->englishRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($englishes->toArray(), 'Englishes retrieved successfully');
    }

    /**
     * Store a newly created English in storage.
     * POST /englishes
     *
     * @param CreateEnglishAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEnglishAPIRequest $request)
    {
        $input = $request->all();

        $english = $this->englishRepository->create($input);

        return $this->sendResponse($english->toArray(), 'English saved successfully');
    }

    /**
     * Display the specified English.
     * GET|HEAD /englishes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var English $english */
        $english = $this->englishRepository->find($id);

        if (empty($english)) {
            return $this->sendError('English not found');
        }

        return $this->sendResponse($english->toArray(), 'English retrieved successfully');
    }

    /**
     * Update the specified English in storage.
     * PUT/PATCH /englishes/{id}
     *
     * @param int $id
     * @param UpdateEnglishAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnglishAPIRequest $request)
    {
        $input = $request->all();

        /** @var English $english */
        $english = $this->englishRepository->find($id);

        if (empty($english)) {
            return $this->sendError('English not found');
        }

        $english = $this->englishRepository->update($input, $id);

        return $this->sendResponse($english->toArray(), 'English updated successfully');
    }

    /**
     * Remove the specified English from storage.
     * DELETE /englishes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var English $english */
        $english = $this->englishRepository->find($id);

        if (empty($english)) {
            return $this->sendError('English not found');
        }

        $english->delete();

        return $this->sendSuccess('English deleted successfully');
    }
}
