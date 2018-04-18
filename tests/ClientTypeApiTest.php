<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientTypeApiTest extends TestCase
{
    use MakeClientTypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateClientType()
    {
        $clientType = $this->fakeClientTypeData();
        $this->json('POST', '/api/v1/clientTypes', $clientType);

        $this->assertApiResponse($clientType);
    }

    /**
     * @test
     */
    public function testReadClientType()
    {
        $clientType = $this->makeClientType();
        $this->json('GET', '/api/v1/clientTypes/'.$clientType->id);

        $this->assertApiResponse($clientType->toArray());
    }

    /**
     * @test
     */
    public function testUpdateClientType()
    {
        $clientType = $this->makeClientType();
        $editedClientType = $this->fakeClientTypeData();

        $this->json('PUT', '/api/v1/clientTypes/'.$clientType->id, $editedClientType);

        $this->assertApiResponse($editedClientType);
    }

    /**
     * @test
     */
    public function testDeleteClientType()
    {
        $clientType = $this->makeClientType();
        $this->json('DELETE', '/api/v1/clientTypes/'.$clientType->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/clientTypes/'.$clientType->id);

        $this->assertResponseStatus(404);
    }
}
