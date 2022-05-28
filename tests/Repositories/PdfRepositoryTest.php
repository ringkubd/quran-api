<?php namespace Tests\Repositories;

use App\Models\Pdf;
use App\Repositories\PdfRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PdfRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PdfRepository
     */
    protected $pdfRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pdfRepo = \App::make(PdfRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pdf()
    {
        $pdf = Pdf::factory()->make()->toArray();

        $createdPdf = $this->pdfRepo->create($pdf);

        $createdPdf = $createdPdf->toArray();
        $this->assertArrayHasKey('id', $createdPdf);
        $this->assertNotNull($createdPdf['id'], 'Created Pdf must have id specified');
        $this->assertNotNull(Pdf::find($createdPdf['id']), 'Pdf with given id must be in DB');
        $this->assertModelData($pdf, $createdPdf);
    }

    /**
     * @test read
     */
    public function test_read_pdf()
    {
        $pdf = Pdf::factory()->create();

        $dbPdf = $this->pdfRepo->find($pdf->id);

        $dbPdf = $dbPdf->toArray();
        $this->assertModelData($pdf->toArray(), $dbPdf);
    }

    /**
     * @test update
     */
    public function test_update_pdf()
    {
        $pdf = Pdf::factory()->create();
        $fakePdf = Pdf::factory()->make()->toArray();

        $updatedPdf = $this->pdfRepo->update($fakePdf, $pdf->id);

        $this->assertModelData($fakePdf, $updatedPdf->toArray());
        $dbPdf = $this->pdfRepo->find($pdf->id);
        $this->assertModelData($fakePdf, $dbPdf->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pdf()
    {
        $pdf = Pdf::factory()->create();

        $resp = $this->pdfRepo->delete($pdf->id);

        $this->assertTrue($resp);
        $this->assertNull(Pdf::find($pdf->id), 'Pdf should not exist in DB');
    }
}
