<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBengaliAPIRequest;
use App\Http\Requests\API\UpdateBengaliAPIRequest;
use App\Models\Bengali;
use App\Repositories\BengaliRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BengaliController
 * @package App\Http\Controllers\API
 */

class BengaliAPIController extends AppBaseController
{
    /** @var  BengaliRepository */
    private $bengaliRepository;

    public function __construct(BengaliRepository $bengaliRepo)
    {
        $this->bengaliRepository = $bengaliRepo;
    }

    /**
     * Display a listing of the Bengali.
     * GET|HEAD /bengalis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bengalis = $this->bengaliRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($bengalis->toArray(), 'Bengalis retrieved successfully');
    }

    /**
     * Store a newly created Bengali in storage.
     * POST /bengalis
     *
     * @param CreateBengaliAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBengaliAPIRequest $request)
    {
        $input = $request->all();

        $bengali = $this->bengaliRepository->create($input);

        return $this->sendResponse($bengali->toArray(), 'Bengali saved successfully');
    }

    /**
     * Display the specified Bengali.
     * GET|HEAD /bengalis/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Bengali $bengali */
        $bengali = $this->bengaliRepository->find($id);

        if (empty($bengali)) {
            return $this->sendError('Bengali not found');
        }

        return $this->sendResponse($bengali->toArray(), 'Bengali retrieved successfully');
    }

    /**
     * Update the specified Bengali in storage.
     * PUT/PATCH /bengalis/{id}
     *
     * @param int $id
     * @param UpdateBengaliAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBengaliAPIRequest $request)
    {
        $input = $request->all();

        /** @var Bengali $bengali */
        $bengali = $this->bengaliRepository->find($id);

        if (empty($bengali)) {
            return $this->sendError('Bengali not found');
        }

        $bengali = $this->bengaliRepository->update($input, $id);

        return $this->sendResponse($bengali->toArray(), 'Bengali updated successfully');
    }

    /**
     * Remove the specified Bengali from storage.
     * DELETE /bengalis/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Bengali $bengali */
        $bengali = $this->bengaliRepository->find($id);

        if (empty($bengali)) {
            return $this->sendError('Bengali not found');
        }

        $bengali->delete();

        return $this->sendSuccess('Bengali deleted successfully');
    }
}
