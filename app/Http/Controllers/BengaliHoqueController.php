<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBengaliHoqueRequest;
use App\Http\Requests\UpdateBengaliHoqueRequest;
use App\Repositories\BengaliHoqueRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BengaliHoqueController extends AppBaseController
{
    /** @var BengaliHoqueRepository $bengaliHoqueRepository*/
    private $bengaliHoqueRepository;

    public function __construct(BengaliHoqueRepository $bengaliHoqueRepo)
    {
        $this->bengaliHoqueRepository = $bengaliHoqueRepo;
    }

    /**
     * Display a listing of the BengaliHoque.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bengaliHoques = $this->bengaliHoqueRepository->all();

        return view('bengali_hoques.index')
            ->with('bengaliHoques', $bengaliHoques);
    }

    /**
     * Show the form for creating a new BengaliHoque.
     *
     * @return Response
     */
    public function create()
    {
        return view('bengali_hoques.create');
    }

    /**
     * Store a newly created BengaliHoque in storage.
     *
     * @param CreateBengaliHoqueRequest $request
     *
     * @return Response
     */
    public function store(CreateBengaliHoqueRequest $request)
    {
        $input = $request->all();

        $bengaliHoque = $this->bengaliHoqueRepository->create($input);

        Flash::success('Bengali Hoque saved successfully.');

        return redirect(route('bengaliHoques.index'));
    }

    /**
     * Display the specified BengaliHoque.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bengaliHoque = $this->bengaliHoqueRepository->find($id);

        if (empty($bengaliHoque)) {
            Flash::error('Bengali Hoque not found');

            return redirect(route('bengaliHoques.index'));
        }

        return view('bengali_hoques.show')->with('bengaliHoque', $bengaliHoque);
    }

    /**
     * Show the form for editing the specified BengaliHoque.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bengaliHoque = $this->bengaliHoqueRepository->find($id);

        if (empty($bengaliHoque)) {
            Flash::error('Bengali Hoque not found');

            return redirect(route('bengaliHoques.index'));
        }

        return view('bengali_hoques.edit')->with('bengaliHoque', $bengaliHoque);
    }

    /**
     * Update the specified BengaliHoque in storage.
     *
     * @param int $id
     * @param UpdateBengaliHoqueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBengaliHoqueRequest $request)
    {
        $bengaliHoque = $this->bengaliHoqueRepository->find($id);

        if (empty($bengaliHoque)) {
            Flash::error('Bengali Hoque not found');

            return redirect(route('bengaliHoques.index'));
        }

        $bengaliHoque = $this->bengaliHoqueRepository->update($request->all(), $id);

        Flash::success('Bengali Hoque updated successfully.');

        return redirect(route('bengaliHoques.index'));
    }

    /**
     * Remove the specified BengaliHoque from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bengaliHoque = $this->bengaliHoqueRepository->find($id);

        if (empty($bengaliHoque)) {
            Flash::error('Bengali Hoque not found');

            return redirect(route('bengaliHoques.index'));
        }

        $this->bengaliHoqueRepository->delete($id);

        Flash::success('Bengali Hoque deleted successfully.');

        return redirect(route('bengaliHoques.index'));
    }
}
