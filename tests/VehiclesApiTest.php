<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehiclesApiTest extends TestCase
{
    use MakeVehiclesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVehicles()
    {
        $vehicles = $this->fakeVehiclesData();
        $this->json('POST', '/api/v1/vehicles', $vehicles);

        $this->assertApiResponse($vehicles);
    }

    /**
     * @test
     */
    public function testReadVehicles()
    {
        $vehicles = $this->makeVehicles();
        $this->json('GET', '/api/v1/vehicles/'.$vehicles->id);

        $this->assertApiResponse($vehicles->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVehicles()
    {
        $vehicles = $this->makeVehicles();
        $editedVehicles = $this->fakeVehiclesData();

        $this->json('PUT', '/api/v1/vehicles/'.$vehicles->id, $editedVehicles);

        $this->assertApiResponse($editedVehicles);
    }

    /**
     * @test
     */
    public function testDeleteVehicles()
    {
        $vehicles = $this->makeVehicles();
        $this->json('DELETE', '/api/v1/vehicles/'.$vehicles->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/vehicles/'.$vehicles->id);

        $this->assertResponseStatus(404);
    }
}
