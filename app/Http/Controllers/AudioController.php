<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAudioRequest;
use App\Http\Requests\UpdateAudioRequest;
use App\Repositories\AudioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AudioController extends AppBaseController
{
    /** @var AudioRepository $audioRepository*/
    private $audioRepository;

    public function __construct(AudioRepository $audioRepo)
    {
        $this->audioRepository = $audioRepo;
    }

    /**
     * Display a listing of the Audio.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $audio = $this->audioRepository->all();

        return view('audio.index')
            ->with('audio', $audio);
    }

    /**
     * Show the form for creating a new Audio.
     *
     * @return Response
     */
    public function create()
    {
        return view('audio.create');
    }

    /**
     * Store a newly created Audio in storage.
     *
     * @param CreateAudioRequest $request
     *
     * @return Response
     */
    public function store(CreateAudioRequest $request)
    {
        $input = $request->all();

        $audio = $this->audioRepository->create($input);

        Flash::success('Audio saved successfully.');

        return redirect(route('audio.index'));
    }

    /**
     * Display the specified Audio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $audio = $this->audioRepository->find($id);

        if (empty($audio)) {
            Flash::error('Audio not found');

            return redirect(route('audio.index'));
        }

        return view('audio.show')->with('audio', $audio);
    }

    /**
     * Show the form for editing the specified Audio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $audio = $this->audioRepository->find($id);

        if (empty($audio)) {
            Flash::error('Audio not found');

            return redirect(route('audio.index'));
        }

        return view('audio.edit')->with('audio', $audio);
    }

    /**
     * Update the specified Audio in storage.
     *
     * @param int $id
     * @param UpdateAudioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAudioRequest $request)
    {
        $audio = $this->audioRepository->find($id);

        if (empty($audio)) {
            Flash::error('Audio not found');

            return redirect(route('audio.index'));
        }

        $audio = $this->audioRepository->update($request->all(), $id);

        Flash::success('Audio updated successfully.');

        return redirect(route('audio.index'));
    }

    /**
     * Remove the specified Audio from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $audio = $this->audioRepository->find($id);

        if (empty($audio)) {
            Flash::error('Audio not found');

            return redirect(route('audio.index'));
        }

        $this->audioRepository->delete($id);

        Flash::success('Audio deleted successfully.');

        return redirect(route('audio.index'));
    }
}
