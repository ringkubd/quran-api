<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBengaliHoqueAPIRequest;
use App\Http\Requests\API\UpdateBengaliHoqueAPIRequest;
use App\Models\BengaliHoque;
use App\Repositories\BengaliHoqueRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BengaliHoqueController
 * @package App\Http\Controllers\API
 */

class BengaliHoqueAPIController extends AppBaseController
{
    /** @var  BengaliHoqueRepository */
    private $bengaliHoqueRepository;

    public function __construct(BengaliHoqueRepository $bengaliHoqueRepo)
    {
        $this->bengaliHoqueRepository = $bengaliHoqueRepo;
    }

    /**
     * Display a listing of the BengaliHoque.
     * GET|HEAD /bengaliHoques
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bengaliHoques = $this->bengaliHoqueRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($bengaliHoques->toArray(), 'Bengali Hoques retrieved successfully');
    }

    /**
     * Store a newly created BengaliHoque in storage.
     * POST /bengaliHoques
     *
     * @param CreateBengaliHoqueAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBengaliHoqueAPIRequest $request)
    {
        $input = $request->all();

        $bengaliHoque = $this->bengaliHoqueRepository->create($input);

        return $this->sendResponse($bengaliHoque->toArray(), 'Bengali Hoque saved successfully');
    }

    /**
     * Display the specified BengaliHoque.
     * GET|HEAD /bengaliHoques/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BengaliHoque $bengaliHoque */
        $bengaliHoque = $this->bengaliHoqueRepository->find($id);

        if (empty($bengaliHoque)) {
            return $this->sendError('Bengali Hoque not found');
        }

        return $this->sendResponse($bengaliHoque->toArray(), 'Bengali Hoque retrieved successfully');
    }

    /**
     * Update the specified BengaliHoque in storage.
     * PUT/PATCH /bengaliHoques/{id}
     *
     * @param int $id
     * @param UpdateBengaliHoqueAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBengaliHoqueAPIRequest $request)
    {
        $input = $request->all();

        /** @var BengaliHoque $bengaliHoque */
        $bengaliHoque = $this->bengaliHoqueRepository->find($id);

        if (empty($bengaliHoque)) {
            return $this->sendError('Bengali Hoque not found');
        }

        $bengaliHoque = $this->bengaliHoqueRepository->update($input, $id);

        return $this->sendResponse($bengaliHoque->toArray(), 'BengaliHoque updated successfully');
    }

    /**
     * Remove the specified BengaliHoque from storage.
     * DELETE /bengaliHoques/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BengaliHoque $bengaliHoque */
        $bengaliHoque = $this->bengaliHoqueRepository->find($id);

        if (empty($bengaliHoque)) {
            return $this->sendError('Bengali Hoque not found');
        }

        $bengaliHoque->delete();

        return $this->sendSuccess('Bengali Hoque deleted successfully');
    }
}
