<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBengaliRequest;
use App\Http\Requests\UpdateBengaliRequest;
use App\Repositories\BengaliRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BengaliController extends AppBaseController
{
    /** @var BengaliRepository $bengaliRepository*/
    private $bengaliRepository;

    public function __construct(BengaliRepository $bengaliRepo)
    {
        $this->bengaliRepository = $bengaliRepo;
    }

    /**
     * Display a listing of the Bengali.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bengalis = $this->bengaliRepository->all();

        return view('bengalis.index')
            ->with('bengalis', $bengalis);
    }

    /**
     * Show the form for creating a new Bengali.
     *
     * @return Response
     */
    public function create()
    {
        return view('bengalis.create');
    }

    /**
     * Store a newly created Bengali in storage.
     *
     * @param CreateBengaliRequest $request
     *
     * @return Response
     */
    public function store(CreateBengaliRequest $request)
    {
        $input = $request->all();

        $bengali = $this->bengaliRepository->create($input);

        Flash::success('Bengali saved successfully.');

        return redirect(route('bengalis.index'));
    }

    /**
     * Display the specified Bengali.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bengali = $this->bengaliRepository->find($id);

        if (empty($bengali)) {
            Flash::error('Bengali not found');

            return redirect(route('bengalis.index'));
        }

        return view('bengalis.show')->with('bengali', $bengali);
    }

    /**
     * Show the form for editing the specified Bengali.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bengali = $this->bengaliRepository->find($id);

        if (empty($bengali)) {
            Flash::error('Bengali not found');

            return redirect(route('bengalis.index'));
        }

        return view('bengalis.edit')->with('bengali', $bengali);
    }

    /**
     * Update the specified Bengali in storage.
     *
     * @param int $id
     * @param UpdateBengaliRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBengaliRequest $request)
    {
        $bengali = $this->bengaliRepository->find($id);

        if (empty($bengali)) {
            Flash::error('Bengali not found');

            return redirect(route('bengalis.index'));
        }

        $bengali = $this->bengaliRepository->update($request->all(), $id);

        Flash::success('Bengali updated successfully.');

        return redirect(route('bengalis.index'));
    }

    /**
     * Remove the specified Bengali from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bengali = $this->bengaliRepository->find($id);

        if (empty($bengali)) {
            Flash::error('Bengali not found');

            return redirect(route('bengalis.index'));
        }

        $this->bengaliRepository->delete($id);

        Flash::success('Bengali deleted successfully.');

        return redirect(route('bengalis.index'));
    }
}
