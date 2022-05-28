<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuranRequest;
use App\Http\Requests\UpdateQuranRequest;
use App\Repositories\QuranRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class QuranController extends AppBaseController
{
    /** @var QuranRepository $quranRepository*/
    private $quranRepository;

    public function __construct(QuranRepository $quranRepo)
    {
        $this->quranRepository = $quranRepo;
    }

    /**
     * Display a listing of the Quran.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $qurans = $this->quranRepository->all();

        return view('qurans.index')
            ->with('qurans', $qurans);
    }

    /**
     * Show the form for creating a new Quran.
     *
     * @return Response
     */
    public function create()
    {
        return view('qurans.create');
    }

    /**
     * Store a newly created Quran in storage.
     *
     * @param CreateQuranRequest $request
     *
     * @return Response
     */
    public function store(CreateQuranRequest $request)
    {
        $input = $request->all();

        $quran = $this->quranRepository->create($input);

        Flash::success('Quran saved successfully.');

        return redirect(route('qurans.index'));
    }

    /**
     * Display the specified Quran.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quran = $this->quranRepository->find($id);

        if (empty($quran)) {
            Flash::error('Quran not found');

            return redirect(route('qurans.index'));
        }

        return view('qurans.show')->with('quran', $quran);
    }

    /**
     * Show the form for editing the specified Quran.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quran = $this->quranRepository->find($id);

        if (empty($quran)) {
            Flash::error('Quran not found');

            return redirect(route('qurans.index'));
        }

        return view('qurans.edit')->with('quran', $quran);
    }

    /**
     * Update the specified Quran in storage.
     *
     * @param int $id
     * @param UpdateQuranRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuranRequest $request)
    {
        $quran = $this->quranRepository->find($id);

        if (empty($quran)) {
            Flash::error('Quran not found');

            return redirect(route('qurans.index'));
        }

        $quran = $this->quranRepository->update($request->all(), $id);

        Flash::success('Quran updated successfully.');

        return redirect(route('qurans.index'));
    }

    /**
     * Remove the specified Quran from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quran = $this->quranRepository->find($id);

        if (empty($quran)) {
            Flash::error('Quran not found');

            return redirect(route('qurans.index'));
        }

        $this->quranRepository->delete($id);

        Flash::success('Quran deleted successfully.');

        return redirect(route('qurans.index'));
    }
}
