<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTafsirRequest;
use App\Http\Requests\UpdateTafsirRequest;
use App\Repositories\TafsirRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TafsirController extends AppBaseController
{
    /** @var TafsirRepository $tafsirRepository*/
    private $tafsirRepository;

    public function __construct(TafsirRepository $tafsirRepo)
    {
        $this->tafsirRepository = $tafsirRepo;
    }

    /**
     * Display a listing of the Tafsir.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tafsirs = $this->tafsirRepository->all();

        return view('tafsirs.index')
            ->with('tafsirs', $tafsirs);
    }

    /**
     * Show the form for creating a new Tafsir.
     *
     * @return Response
     */
    public function create()
    {
        return view('tafsirs.create');
    }

    /**
     * Store a newly created Tafsir in storage.
     *
     * @param CreateTafsirRequest $request
     *
     * @return Response
     */
    public function store(CreateTafsirRequest $request)
    {
        $input = $request->all();

        $tafsir = $this->tafsirRepository->create($input);

        Flash::success('Tafsir saved successfully.');

        return redirect(route('tafsirs.index'));
    }

    /**
     * Display the specified Tafsir.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tafsir = $this->tafsirRepository->find($id);

        if (empty($tafsir)) {
            Flash::error('Tafsir not found');

            return redirect(route('tafsirs.index'));
        }

        return view('tafsirs.show')->with('tafsir', $tafsir);
    }

    /**
     * Show the form for editing the specified Tafsir.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tafsir = $this->tafsirRepository->find($id);

        if (empty($tafsir)) {
            Flash::error('Tafsir not found');

            return redirect(route('tafsirs.index'));
        }

        return view('tafsirs.edit')->with('tafsir', $tafsir);
    }

    /**
     * Update the specified Tafsir in storage.
     *
     * @param int $id
     * @param UpdateTafsirRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTafsirRequest $request)
    {
        $tafsir = $this->tafsirRepository->find($id);

        if (empty($tafsir)) {
            Flash::error('Tafsir not found');

            return redirect(route('tafsirs.index'));
        }

        $tafsir = $this->tafsirRepository->update($request->all(), $id);

        Flash::success('Tafsir updated successfully.');

        return redirect(route('tafsirs.index'));
    }

    /**
     * Remove the specified Tafsir from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tafsir = $this->tafsirRepository->find($id);

        if (empty($tafsir)) {
            Flash::error('Tafsir not found');

            return redirect(route('tafsirs.index'));
        }

        $this->tafsirRepository->delete($id);

        Flash::success('Tafsir deleted successfully.');

        return redirect(route('tafsirs.index'));
    }
}
