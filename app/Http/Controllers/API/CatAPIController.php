<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCatAPIRequest;
use App\Http\Requests\API\UpdateCatAPIRequest;
use App\Models\Cat;
use App\Repositories\CatRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CatController
 * @package App\Http\Controllers\API
 */

class CatAPIController extends AppBaseController
{
    /** @var  CatRepository */
    private $catRepository;

    public function __construct(CatRepository $catRepo)
    {
        $this->catRepository = $catRepo;
    }

    /**
     * Display a listing of the Cat.
     * GET|HEAD /cats
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cats = $this->catRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cats->toArray(), 'Cats retrieved successfully');
    }

    /**
     * Store a newly created Cat in storage.
     * POST /cats
     *
     * @param CreateCatAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCatAPIRequest $request)
    {
        $input = $request->all();

        $cat = $this->catRepository->create($input);

        return $this->sendResponse($cat->toArray(), 'Cat saved successfully');
    }

    /**
     * Display the specified Cat.
     * GET|HEAD /cats/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cat $cat */
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            return $this->sendError('Cat not found');
        }

        return $this->sendResponse($cat->toArray(), 'Cat retrieved successfully');
    }

    /**
     * Update the specified Cat in storage.
     * PUT/PATCH /cats/{id}
     *
     * @param int $id
     * @param UpdateCatAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCatAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cat $cat */
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            return $this->sendError('Cat not found');
        }

        $cat = $this->catRepository->update($input, $id);

        return $this->sendResponse($cat->toArray(), 'Cat updated successfully');
    }

    /**
     * Remove the specified Cat from storage.
     * DELETE /cats/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cat $cat */
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            return $this->sendError('Cat not found');
        }

        $cat->delete();

        return $this->sendSuccess('Cat deleted successfully');
    }
}
