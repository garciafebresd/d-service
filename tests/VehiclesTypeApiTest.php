<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehiclesTypeApiTest extends TestCase
{
    use MakeVehiclesTypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVehiclesType()
    {
        $vehiclesType = $this->fakeVehiclesTypeData();
        $this->json('POST', '/api/v1/vehiclesTypes', $vehiclesType);

        $this->assertApiResponse($vehiclesType);
    }

    /**
     * @test
     */
    public function testReadVehiclesType()
    {
        $vehiclesType = $this->makeVehiclesType();
        $this->json('GET', '/api/v1/vehiclesTypes/'.$vehiclesType->id);

        $this->assertApiResponse($vehiclesType->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVehiclesType()
    {
        $vehiclesType = $this->makeVehiclesType();
        $editedVehiclesType = $this->fakeVehiclesTypeData();

        $this->json('PUT', '/api/v1/vehiclesTypes/'.$vehiclesType->id, $editedVehiclesType);

        $this->assertApiResponse($editedVehiclesType);
    }

    /**
     * @test
     */
    public function testDeleteVehiclesType()
    {
        $vehiclesType = $this->makeVehiclesType();
        $this->json('DELETE', '/api/v1/vehiclesTypes/'.$vehiclesType->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/vehiclesTypes/'.$vehiclesType->id);

        $this->assertResponseStatus(404);
    }
}
