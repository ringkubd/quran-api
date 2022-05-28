<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Audio;

class AudioApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_audio()
    {
        $audio = Audio::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/audio', $audio
        );

        $this->assertApiResponse($audio);
    }

    /**
     * @test
     */
    public function test_read_audio()
    {
        $audio = Audio::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/audio/'.$audio->id
        );

        $this->assertApiResponse($audio->toArray());
    }

    /**
     * @test
     */
    public function test_update_audio()
    {
        $audio = Audio::factory()->create();
        $editedAudio = Audio::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/audio/'.$audio->id,
            $editedAudio
        );

        $this->assertApiResponse($editedAudio);
    }

    /**
     * @test
     */
    public function test_delete_audio()
    {
        $audio = Audio::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/audio/'.$audio->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/audio/'.$audio->id
        );

        $this->response->assertStatus(404);
    }
}
