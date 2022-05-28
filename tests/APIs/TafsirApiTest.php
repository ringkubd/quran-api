<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Tafsir;

class TafsirApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tafsir()
    {
        $tafsir = Tafsir::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tafsirs', $tafsir
        );

        $this->assertApiResponse($tafsir);
    }

    /**
     * @test
     */
    public function test_read_tafsir()
    {
        $tafsir = Tafsir::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/tafsirs/'.$tafsir->id
        );

        $this->assertApiResponse($tafsir->toArray());
    }

    /**
     * @test
     */
    public function test_update_tafsir()
    {
        $tafsir = Tafsir::factory()->create();
        $editedTafsir = Tafsir::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tafsirs/'.$tafsir->id,
            $editedTafsir
        );

        $this->assertApiResponse($editedTafsir);
    }

    /**
     * @test
     */
    public function test_delete_tafsir()
    {
        $tafsir = Tafsir::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tafsirs/'.$tafsir->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tafsirs/'.$tafsir->id
        );

        $this->response->assertStatus(404);
    }
}
