<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Quran;

class QuranApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_quran()
    {
        $quran = Quran::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/qurans', $quran
        );

        $this->assertApiResponse($quran);
    }

    /**
     * @test
     */
    public function test_read_quran()
    {
        $quran = Quran::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/qurans/'.$quran->id
        );

        $this->assertApiResponse($quran->toArray());
    }

    /**
     * @test
     */
    public function test_update_quran()
    {
        $quran = Quran::factory()->create();
        $editedQuran = Quran::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/qurans/'.$quran->id,
            $editedQuran
        );

        $this->assertApiResponse($editedQuran);
    }

    /**
     * @test
     */
    public function test_delete_quran()
    {
        $quran = Quran::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/qurans/'.$quran->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/qurans/'.$quran->id
        );

        $this->response->assertStatus(404);
    }
}
