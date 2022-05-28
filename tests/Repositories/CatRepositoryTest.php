<?php namespace Tests\Repositories;

use App\Models\Cat;
use App\Repositories\CatRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CatRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CatRepository
     */
    protected $catRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->catRepo = \App::make(CatRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cat()
    {
        $cat = Cat::factory()->make()->toArray();

        $createdCat = $this->catRepo->create($cat);

        $createdCat = $createdCat->toArray();
        $this->assertArrayHasKey('id', $createdCat);
        $this->assertNotNull($createdCat['id'], 'Created Cat must have id specified');
        $this->assertNotNull(Cat::find($createdCat['id']), 'Cat with given id must be in DB');
        $this->assertModelData($cat, $createdCat);
    }

    /**
     * @test read
     */
    public function test_read_cat()
    {
        $cat = Cat::factory()->create();

        $dbCat = $this->catRepo->find($cat->id);

        $dbCat = $dbCat->toArray();
        $this->assertModelData($cat->toArray(), $dbCat);
    }

    /**
     * @test update
     */
    public function test_update_cat()
    {
        $cat = Cat::factory()->create();
        $fakeCat = Cat::factory()->make()->toArray();

        $updatedCat = $this->catRepo->update($fakeCat, $cat->id);

        $this->assertModelData($fakeCat, $updatedCat->toArray());
        $dbCat = $this->catRepo->find($cat->id);
        $this->assertModelData($fakeCat, $dbCat->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cat()
    {
        $cat = Cat::factory()->create();

        $resp = $this->catRepo->delete($cat->id);

        $this->assertTrue($resp);
        $this->assertNull(Cat::find($cat->id), 'Cat should not exist in DB');
    }
}
