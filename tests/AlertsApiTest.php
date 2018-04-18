<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AlertsApiTest extends TestCase
{
    use MakeAlertsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAlerts()
    {
        $alerts = $this->fakeAlertsData();
        $this->json('POST', '/api/v1/alerts', $alerts);

        $this->assertApiResponse($alerts);
    }

    /**
     * @test
     */
    public function testReadAlerts()
    {
        $alerts = $this->makeAlerts();
        $this->json('GET', '/api/v1/alerts/'.$alerts->id);

        $this->assertApiResponse($alerts->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAlerts()
    {
        $alerts = $this->makeAlerts();
        $editedAlerts = $this->fakeAlertsData();

        $this->json('PUT', '/api/v1/alerts/'.$alerts->id, $editedAlerts);

        $this->assertApiResponse($editedAlerts);
    }

    /**
     * @test
     */
    public function testDeleteAlerts()
    {
        $alerts = $this->makeAlerts();
        $this->json('DELETE', '/api/v1/alerts/'.$alerts->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/alerts/'.$alerts->id);

        $this->assertResponseStatus(404);
    }
}
