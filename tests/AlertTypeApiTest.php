<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AlertTypeApiTest extends TestCase
{
    use MakeAlertTypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAlertType()
    {
        $alertType = $this->fakeAlertTypeData();
        $this->json('POST', '/api/v1/alertTypes', $alertType);

        $this->assertApiResponse($alertType);
    }

    /**
     * @test
     */
    public function testReadAlertType()
    {
        $alertType = $this->makeAlertType();
        $this->json('GET', '/api/v1/alertTypes/'.$alertType->id);

        $this->assertApiResponse($alertType->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAlertType()
    {
        $alertType = $this->makeAlertType();
        $editedAlertType = $this->fakeAlertTypeData();

        $this->json('PUT', '/api/v1/alertTypes/'.$alertType->id, $editedAlertType);

        $this->assertApiResponse($editedAlertType);
    }

    /**
     * @test
     */
    public function testDeleteAlertType()
    {
        $alertType = $this->makeAlertType();
        $this->json('DELETE', '/api/v1/alertTypes/'.$alertType->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/alertTypes/'.$alertType->id);

        $this->assertResponseStatus(404);
    }
}
