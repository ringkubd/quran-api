<?php namespace Tests\Repositories;

use App\Models\Audio;
use App\Repositories\AudioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AudioRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AudioRepository
     */
    protected $audioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->audioRepo = \App::make(AudioRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_audio()
    {
        $audio = Audio::factory()->make()->toArray();

        $createdAudio = $this->audioRepo->create($audio);

        $createdAudio = $createdAudio->toArray();
        $this->assertArrayHasKey('id', $createdAudio);
        $this->assertNotNull($createdAudio['id'], 'Created Audio must have id specified');
        $this->assertNotNull(Audio::find($createdAudio['id']), 'Audio with given id must be in DB');
        $this->assertModelData($audio, $createdAudio);
    }

    /**
     * @test read
     */
    public function test_read_audio()
    {
        $audio = Audio::factory()->create();

        $dbAudio = $this->audioRepo->find($audio->id);

        $dbAudio = $dbAudio->toArray();
        $this->assertModelData($audio->toArray(), $dbAudio);
    }

    /**
     * @test update
     */
    public function test_update_audio()
    {
        $audio = Audio::factory()->create();
        $fakeAudio = Audio::factory()->make()->toArray();

        $updatedAudio = $this->audioRepo->update($fakeAudio, $audio->id);

        $this->assertModelData($fakeAudio, $updatedAudio->toArray());
        $dbAudio = $this->audioRepo->find($audio->id);
        $this->assertModelData($fakeAudio, $dbAudio->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_audio()
    {
        $audio = Audio::factory()->create();

        $resp = $this->audioRepo->delete($audio->id);

        $this->assertTrue($resp);
        $this->assertNull(Audio::find($audio->id), 'Audio should not exist in DB');
    }
}
