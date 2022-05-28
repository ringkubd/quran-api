<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePdfRequest;
use App\Http\Requests\UpdatePdfRequest;
use App\Repositories\PdfRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PdfController extends AppBaseController
{
    /** @var PdfRepository $pdfRepository*/
    private $pdfRepository;

    public function __construct(PdfRepository $pdfRepo)
    {
        $this->pdfRepository = $pdfRepo;
    }

    /**
     * Display a listing of the Pdf.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pdfs = $this->pdfRepository->all();

        return view('pdfs.index')
            ->with('pdfs', $pdfs);
    }

    /**
     * Show the form for creating a new Pdf.
     *
     * @return Response
     */
    public function create()
    {
        return view('pdfs.create');
    }

    /**
     * Store a newly created Pdf in storage.
     *
     * @param CreatePdfRequest $request
     *
     * @return Response
     */
    public function store(CreatePdfRequest $request)
    {
        $input = $request->all();

        $pdf = $this->pdfRepository->create($input);

        Flash::success('Pdf saved successfully.');

        return redirect(route('pdfs.index'));
    }

    /**
     * Display the specified Pdf.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pdf = $this->pdfRepository->find($id);

        if (empty($pdf)) {
            Flash::error('Pdf not found');

            return redirect(route('pdfs.index'));
        }

        return view('pdfs.show')->with('pdf', $pdf);
    }

    /**
     * Show the form for editing the specified Pdf.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pdf = $this->pdfRepository->find($id);

        if (empty($pdf)) {
            Flash::error('Pdf not found');

            return redirect(route('pdfs.index'));
        }

        return view('pdfs.edit')->with('pdf', $pdf);
    }

    /**
     * Update the specified Pdf in storage.
     *
     * @param int $id
     * @param UpdatePdfRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePdfRequest $request)
    {
        $pdf = $this->pdfRepository->find($id);

        if (empty($pdf)) {
            Flash::error('Pdf not found');

            return redirect(route('pdfs.index'));
        }

        $pdf = $this->pdfRepository->update($request->all(), $id);

        Flash::success('Pdf updated successfully.');

        return redirect(route('pdfs.index'));
    }

    /**
     * Remove the specified Pdf from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pdf = $this->pdfRepository->find($id);

        if (empty($pdf)) {
            Flash::error('Pdf not found');

            return redirect(route('pdfs.index'));
        }

        $this->pdfRepository->delete($id);

        Flash::success('Pdf deleted successfully.');

        return redirect(route('pdfs.index'));
    }
}
