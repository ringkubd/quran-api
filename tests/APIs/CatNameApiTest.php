<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CatName;

class CatNameApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cat_name()
    {
        $catName = CatName::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cat_names', $catName
        );

        $this->assertApiResponse($catName);
    }

    /**
     * @test
     */
    public function test_read_cat_name()
    {
        $catName = CatName::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cat_names/'.$catName->id
        );

        $this->assertApiResponse($catName->toArray());
    }

    /**
     * @test
     */
    public function test_update_cat_name()
    {
        $catName = CatName::factory()->create();
        $editedCatName = CatName::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cat_names/'.$catName->id,
            $editedCatName
        );

        $this->assertApiResponse($editedCatName);
    }

    /**
     * @test
     */
    public function test_delete_cat_name()
    {
        $catName = CatName::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cat_names/'.$catName->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cat_names/'.$catName->id
        );

        $this->response->assertStatus(404);
    }
}
