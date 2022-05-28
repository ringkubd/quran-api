<?php namespace Tests\Repositories;

use App\Models\Tafsir;
use App\Repositories\TafsirRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TafsirRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TafsirRepository
     */
    protected $tafsirRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tafsirRepo = \App::make(TafsirRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tafsir()
    {
        $tafsir = Tafsir::factory()->make()->toArray();

        $createdTafsir = $this->tafsirRepo->create($tafsir);

        $createdTafsir = $createdTafsir->toArray();
        $this->assertArrayHasKey('id', $createdTafsir);
        $this->assertNotNull($createdTafsir['id'], 'Created Tafsir must have id specified');
        $this->assertNotNull(Tafsir::find($createdTafsir['id']), 'Tafsir with given id must be in DB');
        $this->assertModelData($tafsir, $createdTafsir);
    }

    /**
     * @test read
     */
    public function test_read_tafsir()
    {
        $tafsir = Tafsir::factory()->create();

        $dbTafsir = $this->tafsirRepo->find($tafsir->id);

        $dbTafsir = $dbTafsir->toArray();
        $this->assertModelData($tafsir->toArray(), $dbTafsir);
    }

    /**
     * @test update
     */
    public function test_update_tafsir()
    {
        $tafsir = Tafsir::factory()->create();
        $fakeTafsir = Tafsir::factory()->make()->toArray();

        $updatedTafsir = $this->tafsirRepo->update($fakeTafsir, $tafsir->id);

        $this->assertModelData($fakeTafsir, $updatedTafsir->toArray());
        $dbTafsir = $this->tafsirRepo->find($tafsir->id);
        $this->assertModelData($fakeTafsir, $dbTafsir->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tafsir()
    {
        $tafsir = Tafsir::factory()->create();

        $resp = $this->tafsirRepo->delete($tafsir->id);

        $this->assertTrue($resp);
        $this->assertNull(Tafsir::find($tafsir->id), 'Tafsir should not exist in DB');
    }
}
