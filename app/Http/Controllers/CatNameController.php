<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatNameRequest;
use App\Http\Requests\UpdateCatNameRequest;
use App\Repositories\CatNameRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CatNameController extends AppBaseController
{
    /** @var CatNameRepository $catNameRepository*/
    private $catNameRepository;

    public function __construct(CatNameRepository $catNameRepo)
    {
        $this->catNameRepository = $catNameRepo;
    }

    /**
     * Display a listing of the CatName.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $catNames = $this->catNameRepository->all();

        return view('cat_names.index')
            ->with('catNames', $catNames);
    }

    /**
     * Show the form for creating a new CatName.
     *
     * @return Response
     */
    public function create()
    {
        return view('cat_names.create');
    }

    /**
     * Store a newly created CatName in storage.
     *
     * @param CreateCatNameRequest $request
     *
     * @return Response
     */
    public function store(CreateCatNameRequest $request)
    {
        $input = $request->all();

        $catName = $this->catNameRepository->create($input);

        Flash::success('Cat Name saved successfully.');

        return redirect(route('catNames.index'));
    }

    /**
     * Display the specified CatName.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catName = $this->catNameRepository->find($id);

        if (empty($catName)) {
            Flash::error('Cat Name not found');

            return redirect(route('catNames.index'));
        }

        return view('cat_names.show')->with('catName', $catName);
    }

    /**
     * Show the form for editing the specified CatName.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catName = $this->catNameRepository->find($id);

        if (empty($catName)) {
            Flash::error('Cat Name not found');

            return redirect(route('catNames.index'));
        }

        return view('cat_names.edit')->with('catName', $catName);
    }

    /**
     * Update the specified CatName in storage.
     *
     * @param int $id
     * @param UpdateCatNameRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCatNameRequest $request)
    {
        $catName = $this->catNameRepository->find($id);

        if (empty($catName)) {
            Flash::error('Cat Name not found');

            return redirect(route('catNames.index'));
        }

        $catName = $this->catNameRepository->update($request->all(), $id);

        Flash::success('Cat Name updated successfully.');

        return redirect(route('catNames.index'));
    }

    /**
     * Remove the specified CatName from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catName = $this->catNameRepository->find($id);

        if (empty($catName)) {
            Flash::error('Cat Name not found');

            return redirect(route('catNames.index'));
        }

        $this->catNameRepository->delete($id);

        Flash::success('Cat Name deleted successfully.');

        return redirect(route('catNames.index'));
    }
}
