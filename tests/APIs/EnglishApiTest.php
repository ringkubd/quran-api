<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\English;

class EnglishApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_english()
    {
        $english = English::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/englishes', $english
        );

        $this->assertApiResponse($english);
    }

    /**
     * @test
     */
    public function test_read_english()
    {
        $english = English::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/englishes/'.$english->id
        );

        $this->assertApiResponse($english->toArray());
    }

    /**
     * @test
     */
    public function test_update_english()
    {
        $english = English::factory()->create();
        $editedEnglish = English::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/englishes/'.$english->id,
            $editedEnglish
        );

        $this->assertApiResponse($editedEnglish);
    }

    /**
     * @test
     */
    public function test_delete_english()
    {
        $english = English::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/englishes/'.$english->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/englishes/'.$english->id
        );

        $this->response->assertStatus(404);
    }
}
