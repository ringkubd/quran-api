<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSuraRequest;
use App\Http\Requests\UpdateSuraRequest;
use App\Repositories\SuraRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SuraController extends AppBaseController
{
    /** @var SuraRepository $suraRepository*/
    private $suraRepository;

    public function __construct(SuraRepository $suraRepo)
    {
        $this->suraRepository = $suraRepo;
    }

    /**
     * Display a listing of the Sura.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $suras = $this->suraRepository->all();

        return view('suras.index')
            ->with('suras', $suras);
    }

    /**
     * Show the form for creating a new Sura.
     *
     * @return Response
     */
    public function create()
    {
        return view('suras.create');
    }

    /**
     * Store a newly created Sura in storage.
     *
     * @param CreateSuraRequest $request
     *
     * @return Response
     */
    public function store(CreateSuraRequest $request)
    {
        $input = $request->all();

        $sura = $this->suraRepository->create($input);

        Flash::success('Sura saved successfully.');

        return redirect(route('suras.index'));
    }

    /**
     * Display the specified Sura.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sura = $this->suraRepository->find($id);

        if (empty($sura)) {
            Flash::error('Sura not found');

            return redirect(route('suras.index'));
        }

        return view('suras.show')->with('sura', $sura);
    }

    /**
     * Show the form for editing the specified Sura.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sura = $this->suraRepository->find($id);

        if (empty($sura)) {
            Flash::error('Sura not found');

            return redirect(route('suras.index'));
        }

        return view('suras.edit')->with('sura', $sura);
    }

    /**
     * Update the specified Sura in storage.
     *
     * @param int $id
     * @param UpdateSuraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSuraRequest $request)
    {
        $sura = $this->suraRepository->find($id);

        if (empty($sura)) {
            Flash::error('Sura not found');

            return redirect(route('suras.index'));
        }

        $sura = $this->suraRepository->update($request->all(), $id);

        Flash::success('Sura updated successfully.');

        return redirect(route('suras.index'));
    }

    /**
     * Remove the specified Sura from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sura = $this->suraRepository->find($id);

        if (empty($sura)) {
            Flash::error('Sura not found');

            return redirect(route('suras.index'));
        }

        $this->suraRepository->delete($id);

        Flash::success('Sura deleted successfully.');

        return redirect(route('suras.index'));
    }
}
