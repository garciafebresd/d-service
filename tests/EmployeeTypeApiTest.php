<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeTypeApiTest extends TestCase
{
    use MakeEmployeeTypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEmployeeType()
    {
        $employeeType = $this->fakeEmployeeTypeData();
        $this->json('POST', '/api/v1/employeeTypes', $employeeType);

        $this->assertApiResponse($employeeType);
    }

    /**
     * @test
     */
    public function testReadEmployeeType()
    {
        $employeeType = $this->makeEmployeeType();
        $this->json('GET', '/api/v1/employeeTypes/'.$employeeType->id);

        $this->assertApiResponse($employeeType->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEmployeeType()
    {
        $employeeType = $this->makeEmployeeType();
        $editedEmployeeType = $this->fakeEmployeeTypeData();

        $this->json('PUT', '/api/v1/employeeTypes/'.$employeeType->id, $editedEmployeeType);

        $this->assertApiResponse($editedEmployeeType);
    }

    /**
     * @test
     */
    public function testDeleteEmployeeType()
    {
        $employeeType = $this->makeEmployeeType();
        $this->json('DELETE', '/api/v1/employeeTypes/'.$employeeType->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/employeeTypes/'.$employeeType->id);

        $this->assertResponseStatus(404);
    }
}
