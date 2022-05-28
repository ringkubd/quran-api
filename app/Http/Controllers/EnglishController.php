<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEnglishRequest;
use App\Http\Requests\UpdateEnglishRequest;
use App\Repositories\EnglishRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class EnglishController extends AppBaseController
{
    /** @var EnglishRepository $englishRepository*/
    private $englishRepository;

    public function __construct(EnglishRepository $englishRepo)
    {
        $this->englishRepository = $englishRepo;
    }

    /**
     * Display a listing of the English.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $englishes = $this->englishRepository->all();

        return view('englishes.index')
            ->with('englishes', $englishes);
    }

    /**
     * Show the form for creating a new English.
     *
     * @return Response
     */
    public function create()
    {
        return view('englishes.create');
    }

    /**
     * Store a newly created English in storage.
     *
     * @param CreateEnglishRequest $request
     *
     * @return Response
     */
    public function store(CreateEnglishRequest $request)
    {
        $input = $request->all();

        $english = $this->englishRepository->create($input);

        Flash::success('English saved successfully.');

        return redirect(route('englishes.index'));
    }

    /**
     * Display the specified English.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $english = $this->englishRepository->find($id);

        if (empty($english)) {
            Flash::error('English not found');

            return redirect(route('englishes.index'));
        }

        return view('englishes.show')->with('english', $english);
    }

    /**
     * Show the form for editing the specified English.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $english = $this->englishRepository->find($id);

        if (empty($english)) {
            Flash::error('English not found');

            return redirect(route('englishes.index'));
        }

        return view('englishes.edit')->with('english', $english);
    }

    /**
     * Update the specified English in storage.
     *
     * @param int $id
     * @param UpdateEnglishRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnglishRequest $request)
    {
        $english = $this->englishRepository->find($id);

        if (empty($english)) {
            Flash::error('English not found');

            return redirect(route('englishes.index'));
        }

        $english = $this->englishRepository->update($request->all(), $id);

        Flash::success('English updated successfully.');

        return redirect(route('englishes.index'));
    }

    /**
     * Remove the specified English from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $english = $this->englishRepository->find($id);

        if (empty($english)) {
            Flash::error('English not found');

            return redirect(route('englishes.index'));
        }

        $this->englishRepository->delete($id);

        Flash::success('English deleted successfully.');

        return redirect(route('englishes.index'));
    }
}
