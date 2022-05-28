<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Bengali;

class BengaliApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bengali()
    {
        $bengali = Bengali::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bengalis', $bengali
        );

        $this->assertApiResponse($bengali);
    }

    /**
     * @test
     */
    public function test_read_bengali()
    {
        $bengali = Bengali::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/bengalis/'.$bengali->id
        );

        $this->assertApiResponse($bengali->toArray());
    }

    /**
     * @test
     */
    public function test_update_bengali()
    {
        $bengali = Bengali::factory()->create();
        $editedBengali = Bengali::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bengalis/'.$bengali->id,
            $editedBengali
        );

        $this->assertApiResponse($editedBengali);
    }

    /**
     * @test
     */
    public function test_delete_bengali()
    {
        $bengali = Bengali::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bengalis/'.$bengali->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bengalis/'.$bengali->id
        );

        $this->response->assertStatus(404);
    }
}
