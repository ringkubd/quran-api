<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePdfAPIRequest;
use App\Http\Requests\API\UpdatePdfAPIRequest;
use App\Models\Pdf;
use App\Repositories\PdfRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PdfController
 * @package App\Http\Controllers\API
 */

class PdfAPIController extends AppBaseController
{
    /** @var  PdfRepository */
    private $pdfRepository;

    public function __construct(PdfRepository $pdfRepo)
    {
        $this->pdfRepository = $pdfRepo;
    }

    /**
     * Display a listing of the Pdf.
     * GET|HEAD /pdfs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pdfs = $this->pdfRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pdfs->toArray(), 'Pdfs retrieved successfully');
    }

    /**
     * Store a newly created Pdf in storage.
     * POST /pdfs
     *
     * @param CreatePdfAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePdfAPIRequest $request)
    {
        $input = $request->all();

        $pdf = $this->pdfRepository->create($input);

        return $this->sendResponse($pdf->toArray(), 'Pdf saved successfully');
    }

    /**
     * Display the specified Pdf.
     * GET|HEAD /pdfs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pdf $pdf */
        $pdf = $this->pdfRepository->find($id);

        if (empty($pdf)) {
            return $this->sendError('Pdf not found');
        }

        return $this->sendResponse($pdf->toArray(), 'Pdf retrieved successfully');
    }

    /**
     * Update the specified Pdf in storage.
     * PUT/PATCH /pdfs/{id}
     *
     * @param int $id
     * @param UpdatePdfAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePdfAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pdf $pdf */
        $pdf = $this->pdfRepository->find($id);

        if (empty($pdf)) {
            return $this->sendError('Pdf not found');
        }

        $pdf = $this->pdfRepository->update($input, $id);

        return $this->sendResponse($pdf->toArray(), 'Pdf updated successfully');
    }

    /**
     * Remove the specified Pdf from storage.
     * DELETE /pdfs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pdf $pdf */
        $pdf = $this->pdfRepository->find($id);

        if (empty($pdf)) {
            return $this->sendError('Pdf not found');
        }

        $pdf->delete();

        return $this->sendSuccess('Pdf deleted successfully');
    }
}
