<?php namespace Tests\Repositories;

use App\Models\Bengali;
use App\Repositories\BengaliRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BengaliRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BengaliRepository
     */
    protected $bengaliRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->bengaliRepo = \App::make(BengaliRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bengali()
    {
        $bengali = Bengali::factory()->make()->toArray();

        $createdBengali = $this->bengaliRepo->create($bengali);

        $createdBengali = $createdBengali->toArray();
        $this->assertArrayHasKey('id', $createdBengali);
        $this->assertNotNull($createdBengali['id'], 'Created Bengali must have id specified');
        $this->assertNotNull(Bengali::find($createdBengali['id']), 'Bengali with given id must be in DB');
        $this->assertModelData($bengali, $createdBengali);
    }

    /**
     * @test read
     */
    public function test_read_bengali()
    {
        $bengali = Bengali::factory()->create();

        $dbBengali = $this->bengaliRepo->find($bengali->id);

        $dbBengali = $dbBengali->toArray();
        $this->assertModelData($bengali->toArray(), $dbBengali);
    }

    /**
     * @test update
     */
    public function test_update_bengali()
    {
        $bengali = Bengali::factory()->create();
        $fakeBengali = Bengali::factory()->make()->toArray();

        $updatedBengali = $this->bengaliRepo->update($fakeBengali, $bengali->id);

        $this->assertModelData($fakeBengali, $updatedBengali->toArray());
        $dbBengali = $this->bengaliRepo->find($bengali->id);
        $this->assertModelData($fakeBengali, $dbBengali->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bengali()
    {
        $bengali = Bengali::factory()->create();

        $resp = $this->bengaliRepo->delete($bengali->id);

        $this->assertTrue($resp);
        $this->assertNull(Bengali::find($bengali->id), 'Bengali should not exist in DB');
    }
}
