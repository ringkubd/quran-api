<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAudioAPIRequest;
use App\Http\Requests\API\UpdateAudioAPIRequest;
use App\Models\Audio;
use App\Repositories\AudioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AudioController
 * @package App\Http\Controllers\API
 */

class AudioAPIController extends AppBaseController
{
    /** @var  AudioRepository */
    private $audioRepository;

    public function __construct(AudioRepository $audioRepo)
    {
        $this->audioRepository = $audioRepo;
    }

    /**
     * Display a listing of the Audio.
     * GET|HEAD /audio
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $audio = $this->audioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($audio->toArray(), 'Audio retrieved successfully');
    }

    /**
     * Store a newly created Audio in storage.
     * POST /audio
     *
     * @param CreateAudioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAudioAPIRequest $request)
    {
        $input = $request->all();

        $audio = $this->audioRepository->create($input);

        return $this->sendResponse($audio->toArray(), 'Audio saved successfully');
    }

    /**
     * Display the specified Audio.
     * GET|HEAD /audio/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Audio $audio */
        $audio = $this->audioRepository->find($id);

        if (empty($audio)) {
            return $this->sendError('Audio not found');
        }

        return $this->sendResponse($audio->toArray(), 'Audio retrieved successfully');
    }

    /**
     * Update the specified Audio in storage.
     * PUT/PATCH /audio/{id}
     *
     * @param int $id
     * @param UpdateAudioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAudioAPIRequest $request)
    {
        $input = $request->all();

        /** @var Audio $audio */
        $audio = $this->audioRepository->find($id);

        if (empty($audio)) {
            return $this->sendError('Audio not found');
        }

        $audio = $this->audioRepository->update($input, $id);

        return $this->sendResponse($audio->toArray(), 'Audio updated successfully');
    }

    /**
     * Remove the specified Audio from storage.
     * DELETE /audio/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Audio $audio */
        $audio = $this->audioRepository->find($id);

        if (empty($audio)) {
            return $this->sendError('Audio not found');
        }

        $audio->delete();

        return $this->sendSuccess('Audio deleted successfully');
    }
}
