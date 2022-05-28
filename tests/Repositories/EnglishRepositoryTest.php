<?php namespace Tests\Repositories;

use App\Models\English;
use App\Repositories\EnglishRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EnglishRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EnglishRepository
     */
    protected $englishRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->englishRepo = \App::make(EnglishRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_english()
    {
        $english = English::factory()->make()->toArray();

        $createdEnglish = $this->englishRepo->create($english);

        $createdEnglish = $createdEnglish->toArray();
        $this->assertArrayHasKey('id', $createdEnglish);
        $this->assertNotNull($createdEnglish['id'], 'Created English must have id specified');
        $this->assertNotNull(English::find($createdEnglish['id']), 'English with given id must be in DB');
        $this->assertModelData($english, $createdEnglish);
    }

    /**
     * @test read
     */
    public function test_read_english()
    {
        $english = English::factory()->create();

        $dbEnglish = $this->englishRepo->find($english->id);

        $dbEnglish = $dbEnglish->toArray();
        $this->assertModelData($english->toArray(), $dbEnglish);
    }

    /**
     * @test update
     */
    public function test_update_english()
    {
        $english = English::factory()->create();
        $fakeEnglish = English::factory()->make()->toArray();

        $updatedEnglish = $this->englishRepo->update($fakeEnglish, $english->id);

        $this->assertModelData($fakeEnglish, $updatedEnglish->toArray());
        $dbEnglish = $this->englishRepo->find($english->id);
        $this->assertModelData($fakeEnglish, $dbEnglish->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_english()
    {
        $english = English::factory()->create();

        $resp = $this->englishRepo->delete($english->id);

        $this->assertTrue($resp);
        $this->assertNull(English::find($english->id), 'English should not exist in DB');
    }
}
