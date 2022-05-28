<?php namespace Tests\Repositories;

use App\Models\CatName;
use App\Repositories\CatNameRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CatNameRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CatNameRepository
     */
    protected $catNameRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->catNameRepo = \App::make(CatNameRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cat_name()
    {
        $catName = CatName::factory()->make()->toArray();

        $createdCatName = $this->catNameRepo->create($catName);

        $createdCatName = $createdCatName->toArray();
        $this->assertArrayHasKey('id', $createdCatName);
        $this->assertNotNull($createdCatName['id'], 'Created CatName must have id specified');
        $this->assertNotNull(CatName::find($createdCatName['id']), 'CatName with given id must be in DB');
        $this->assertModelData($catName, $createdCatName);
    }

    /**
     * @test read
     */
    public function test_read_cat_name()
    {
        $catName = CatName::factory()->create();

        $dbCatName = $this->catNameRepo->find($catName->id);

        $dbCatName = $dbCatName->toArray();
        $this->assertModelData($catName->toArray(), $dbCatName);
    }

    /**
     * @test update
     */
    public function test_update_cat_name()
    {
        $catName = CatName::factory()->create();
        $fakeCatName = CatName::factory()->make()->toArray();

        $updatedCatName = $this->catNameRepo->update($fakeCatName, $catName->id);

        $this->assertModelData($fakeCatName, $updatedCatName->toArray());
        $dbCatName = $this->catNameRepo->find($catName->id);
        $this->assertModelData($fakeCatName, $dbCatName->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cat_name()
    {
        $catName = CatName::factory()->create();

        $resp = $this->catNameRepo->delete($catName->id);

        $this->assertTrue($resp);
        $this->assertNull(CatName::find($catName->id), 'CatName should not exist in DB');
    }
}
