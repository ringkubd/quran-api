<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatRequest;
use App\Http\Requests\UpdateCatRequest;
use App\Repositories\CatRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CatController extends AppBaseController
{
    /** @var CatRepository $catRepository*/
    private $catRepository;

    public function __construct(CatRepository $catRepo)
    {
        $this->catRepository = $catRepo;
    }

    /**
     * Display a listing of the Cat.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cats = $this->catRepository->all();

        return view('cats.index')
            ->with('cats', $cats);
    }

    /**
     * Show the form for creating a new Cat.
     *
     * @return Response
     */
    public function create()
    {
        return view('cats.create');
    }

    /**
     * Store a newly created Cat in storage.
     *
     * @param CreateCatRequest $request
     *
     * @return Response
     */
    public function store(CreateCatRequest $request)
    {
        $input = $request->all();

        $cat = $this->catRepository->create($input);

        Flash::success('Cat saved successfully.');

        return redirect(route('cats.index'));
    }

    /**
     * Display the specified Cat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            Flash::error('Cat not found');

            return redirect(route('cats.index'));
        }

        return view('cats.show')->with('cat', $cat);
    }

    /**
     * Show the form for editing the specified Cat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            Flash::error('Cat not found');

            return redirect(route('cats.index'));
        }

        return view('cats.edit')->with('cat', $cat);
    }

    /**
     * Update the specified Cat in storage.
     *
     * @param int $id
     * @param UpdateCatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCatRequest $request)
    {
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            Flash::error('Cat not found');

            return redirect(route('cats.index'));
        }

        $cat = $this->catRepository->update($request->all(), $id);

        Flash::success('Cat updated successfully.');

        return redirect(route('cats.index'));
    }

    /**
     * Remove the specified Cat from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            Flash::error('Cat not found');

            return redirect(route('cats.index'));
        }

        $this->catRepository->delete($id);

        Flash::success('Cat deleted successfully.');

        return redirect(route('cats.index'));
    }
}
