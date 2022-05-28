<?php namespace Tests\Repositories;

use App\Models\Sura;
use App\Repositories\SuraRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SuraRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SuraRepository
     */
    protected $suraRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->suraRepo = \App::make(SuraRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sura()
    {
        $sura = Sura::factory()->make()->toArray();

        $createdSura = $this->suraRepo->create($sura);

        $createdSura = $createdSura->toArray();
        $this->assertArrayHasKey('id', $createdSura);
        $this->assertNotNull($createdSura['id'], 'Created Sura must have id specified');
        $this->assertNotNull(Sura::find($createdSura['id']), 'Sura with given id must be in DB');
        $this->assertModelData($sura, $createdSura);
    }

    /**
     * @test read
     */
    public function test_read_sura()
    {
        $sura = Sura::factory()->create();

        $dbSura = $this->suraRepo->find($sura->id);

        $dbSura = $dbSura->toArray();
        $this->assertModelData($sura->toArray(), $dbSura);
    }

    /**
     * @test update
     */
    public function test_update_sura()
    {
        $sura = Sura::factory()->create();
        $fakeSura = Sura::factory()->make()->toArray();

        $updatedSura = $this->suraRepo->update($fakeSura, $sura->id);

        $this->assertModelData($fakeSura, $updatedSura->toArray());
        $dbSura = $this->suraRepo->find($sura->id);
        $this->assertModelData($fakeSura, $dbSura->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sura()
    {
        $sura = Sura::factory()->create();

        $resp = $this->suraRepo->delete($sura->id);

        $this->assertTrue($resp);
        $this->assertNull(Sura::find($sura->id), 'Sura should not exist in DB');
    }
}
