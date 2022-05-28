<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pdf;

class PdfApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pdf()
    {
        $pdf = Pdf::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pdfs', $pdf
        );

        $this->assertApiResponse($pdf);
    }

    /**
     * @test
     */
    public function test_read_pdf()
    {
        $pdf = Pdf::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/pdfs/'.$pdf->id
        );

        $this->assertApiResponse($pdf->toArray());
    }

    /**
     * @test
     */
    public function test_update_pdf()
    {
        $pdf = Pdf::factory()->create();
        $editedPdf = Pdf::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pdfs/'.$pdf->id,
            $editedPdf
        );

        $this->assertApiResponse($editedPdf);
    }

    /**
     * @test
     */
    public function test_delete_pdf()
    {
        $pdf = Pdf::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pdfs/'.$pdf->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pdfs/'.$pdf->id
        );

        $this->response->assertStatus(404);
    }
}
