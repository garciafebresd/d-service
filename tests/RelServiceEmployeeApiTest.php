<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RelServiceEmployeeApiTest extends TestCase
{
    use MakeRelServiceEmployeeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRelServiceEmployee()
    {
        $relServiceEmployee = $this->fakeRelServiceEmployeeData();
        $this->json('POST', '/api/v1/relServiceEmployees', $relServiceEmployee);

        $this->assertApiResponse($relServiceEmployee);
    }

    /**
     * @test
     */
    public function testReadRelServiceEmployee()
    {
        $relServiceEmployee = $this->makeRelServiceEmployee();
        $this->json('GET', '/api/v1/relServiceEmployees/'.$relServiceEmployee->id);

        $this->assertApiResponse($relServiceEmployee->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRelServiceEmployee()
    {
        $relServiceEmployee = $this->makeRelServiceEmployee();
        $editedRelServiceEmployee = $this->fakeRelServiceEmployeeData();

        $this->json('PUT', '/api/v1/relServiceEmployees/'.$relServiceEmployee->id, $editedRelServiceEmployee);

        $this->assertApiResponse($editedRelServiceEmployee);
    }

    /**
     * @test
     */
    public function testDeleteRelServiceEmployee()
    {
        $relServiceEmployee = $this->makeRelServiceEmployee();
        $this->json('DELETE', '/api/v1/relServiceEmployees/'.$relServiceEmployee->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/relServiceEmployees/'.$relServiceEmployee->id);

        $this->assertResponseStatus(404);
    }
}
