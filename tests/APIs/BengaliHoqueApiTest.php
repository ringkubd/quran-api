<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BengaliHoque;

class BengaliHoqueApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bengali_hoque()
    {
        $bengaliHoque = BengaliHoque::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bengali_hoques', $bengaliHoque
        );

        $this->assertApiResponse($bengaliHoque);
    }

    /**
     * @test
     */
    public function test_read_bengali_hoque()
    {
        $bengaliHoque = BengaliHoque::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/bengali_hoques/'.$bengaliHoque->id
        );

        $this->assertApiResponse($bengaliHoque->toArray());
    }

    /**
     * @test
     */
    public function test_update_bengali_hoque()
    {
        $bengaliHoque = BengaliHoque::factory()->create();
        $editedBengaliHoque = BengaliHoque::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bengali_hoques/'.$bengaliHoque->id,
            $editedBengaliHoque
        );

        $this->assertApiResponse($editedBengaliHoque);
    }

    /**
     * @test
     */
    public function test_delete_bengali_hoque()
    {
        $bengaliHoque = BengaliHoque::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bengali_hoques/'.$bengaliHoque->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bengali_hoques/'.$bengaliHoque->id
        );

        $this->response->assertStatus(404);
    }
}
