<?php namespace Tests\Repositories;

use App\Models\Quran;
use App\Repositories\QuranRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class QuranRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var QuranRepository
     */
    protected $quranRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->quranRepo = \App::make(QuranRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_quran()
    {
        $quran = Quran::factory()->make()->toArray();

        $createdQuran = $this->quranRepo->create($quran);

        $createdQuran = $createdQuran->toArray();
        $this->assertArrayHasKey('id', $createdQuran);
        $this->assertNotNull($createdQuran['id'], 'Created Quran must have id specified');
        $this->assertNotNull(Quran::find($createdQuran['id']), 'Quran with given id must be in DB');
        $this->assertModelData($quran, $createdQuran);
    }

    /**
     * @test read
     */
    public function test_read_quran()
    {
        $quran = Quran::factory()->create();

        $dbQuran = $this->quranRepo->find($quran->id);

        $dbQuran = $dbQuran->toArray();
        $this->assertModelData($quran->toArray(), $dbQuran);
    }

    /**
     * @test update
     */
    public function test_update_quran()
    {
        $quran = Quran::factory()->create();
        $fakeQuran = Quran::factory()->make()->toArray();

        $updatedQuran = $this->quranRepo->update($fakeQuran, $quran->id);

        $this->assertModelData($fakeQuran, $updatedQuran->toArray());
        $dbQuran = $this->quranRepo->find($quran->id);
        $this->assertModelData($fakeQuran, $dbQuran->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_quran()
    {
        $quran = Quran::factory()->create();

        $resp = $this->quranRepo->delete($quran->id);

        $this->assertTrue($resp);
        $this->assertNull(Quran::find($quran->id), 'Quran should not exist in DB');
    }
}
