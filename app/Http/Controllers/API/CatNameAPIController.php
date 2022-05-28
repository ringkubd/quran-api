<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCatNameAPIRequest;
use App\Http\Requests\API\UpdateCatNameAPIRequest;
use App\Models\CatName;
use App\Repositories\CatNameRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CatNameController
 * @package App\Http\Controllers\API
 */

class CatNameAPIController extends AppBaseController
{
    /** @var  CatNameRepository */
    private $catNameRepository;

    public function __construct(CatNameRepository $catNameRepo)
    {
        $this->catNameRepository = $catNameRepo;
    }

    /**
     * Display a listing of the CatName.
     * GET|HEAD /catNames
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $catNames = $this->catNameRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($catNames->toArray(), 'Cat Names retrieved successfully');
    }

    /**
     * Store a newly created CatName in storage.
     * POST /catNames
     *
     * @param CreateCatNameAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCatNameAPIRequest $request)
    {
        $input = $request->all();

        $catName = $this->catNameRepository->create($input);

        return $this->sendResponse($catName->toArray(), 'Cat Name saved successfully');
    }

    /**
     * Display the specified CatName.
     * GET|HEAD /catNames/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CatName $catName */
        $catName = $this->catNameRepository->find($id);

        if (empty($catName)) {
            return $this->sendError('Cat Name not found');
        }

        return $this->sendResponse($catName->toArray(), 'Cat Name retrieved successfully');
    }

    /**
     * Update the specified CatName in storage.
     * PUT/PATCH /catNames/{id}
     *
     * @param int $id
     * @param UpdateCatNameAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCatNameAPIRequest $request)
    {
        $input = $request->all();

        /** @var CatName $catName */
        $catName = $this->catNameRepository->find($id);

        if (empty($catName)) {
            return $this->sendError('Cat Name not found');
        }

        $catName = $this->catNameRepository->update($input, $id);

        return $this->sendResponse($catName->toArray(), 'CatName updated successfully');
    }

    /**
     * Remove the specified CatName from storage.
     * DELETE /catNames/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CatName $catName */
        $catName = $this->catNameRepository->find($id);

        if (empty($catName)) {
            return $this->sendError('Cat Name not found');
        }

        $catName->delete();

        return $this->sendSuccess('Cat Name deleted successfully');
    }
}
