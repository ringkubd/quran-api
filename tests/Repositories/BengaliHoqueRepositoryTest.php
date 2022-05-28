<?php namespace Tests\Repositories;

use App\Models\BengaliHoque;
use App\Repositories\BengaliHoqueRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BengaliHoqueRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BengaliHoqueRepository
     */
    protected $bengaliHoqueRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->bengaliHoqueRepo = \App::make(BengaliHoqueRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bengali_hoque()
    {
        $bengaliHoque = BengaliHoque::factory()->make()->toArray();

        $createdBengaliHoque = $this->bengaliHoqueRepo->create($bengaliHoque);

        $createdBengaliHoque = $createdBengaliHoque->toArray();
        $this->assertArrayHasKey('id', $createdBengaliHoque);
        $this->assertNotNull($createdBengaliHoque['id'], 'Created BengaliHoque must have id specified');
        $this->assertNotNull(BengaliHoque::find($createdBengaliHoque['id']), 'BengaliHoque with given id must be in DB');
        $this->assertModelData($bengaliHoque, $createdBengaliHoque);
    }

    /**
     * @test read
     */
    public function test_read_bengali_hoque()
    {
        $bengaliHoque = BengaliHoque::factory()->create();

        $dbBengaliHoque = $this->bengaliHoqueRepo->find($bengaliHoque->id);

        $dbBengaliHoque = $dbBengaliHoque->toArray();
        $this->assertModelData($bengaliHoque->toArray(), $dbBengaliHoque);
    }

    /**
     * @test update
     */
    public function test_update_bengali_hoque()
    {
        $bengaliHoque = BengaliHoque::factory()->create();
        $fakeBengaliHoque = BengaliHoque::factory()->make()->toArray();

        $updatedBengaliHoque = $this->bengaliHoqueRepo->update($fakeBengaliHoque, $bengaliHoque->id);

        $this->assertModelData($fakeBengaliHoque, $updatedBengaliHoque->toArray());
        $dbBengaliHoque = $this->bengaliHoqueRepo->find($bengaliHoque->id);
        $this->assertModelData($fakeBengaliHoque, $dbBengaliHoque->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bengali_hoque()
    {
        $bengaliHoque = BengaliHoque::factory()->create();

        $resp = $this->bengaliHoqueRepo->delete($bengaliHoque->id);

        $this->assertTrue($resp);
        $this->assertNull(BengaliHoque::find($bengaliHoque->id), 'BengaliHoque should not exist in DB');
    }
}
