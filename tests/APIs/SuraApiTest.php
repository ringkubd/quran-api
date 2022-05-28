<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Sura;

class SuraApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sura()
    {
        $sura = Sura::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/suras', $sura
        );

        $this->assertApiResponse($sura);
    }

    /**
     * @test
     */
    public function test_read_sura()
    {
        $sura = Sura::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/suras/'.$sura->id
        );

        $this->assertApiResponse($sura->toArray());
    }

    /**
     * @test
     */
    public function test_update_sura()
    {
        $sura = Sura::factory()->create();
        $editedSura = Sura::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/suras/'.$sura->id,
            $editedSura
        );

        $this->assertApiResponse($editedSura);
    }

    /**
     * @test
     */
    public function test_delete_sura()
    {
        $sura = Sura::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/suras/'.$sura->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/suras/'.$sura->id
        );

        $this->response->assertStatus(404);
    }
}
