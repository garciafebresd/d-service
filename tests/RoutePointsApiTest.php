<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoutePointsApiTest extends TestCase
{
    use MakeRoutePointsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRoutePoints()
    {
        $routePoints = $this->fakeRoutePointsData();
        $this->json('POST', '/api/v1/routePoints', $routePoints);

        $this->assertApiResponse($routePoints);
    }

    /**
     * @test
     */
    public function testReadRoutePoints()
    {
        $routePoints = $this->makeRoutePoints();
        $this->json('GET', '/api/v1/routePoints/'.$routePoints->id);

        $this->assertApiResponse($routePoints->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRoutePoints()
    {
        $routePoints = $this->makeRoutePoints();
        $editedRoutePoints = $this->fakeRoutePointsData();

        $this->json('PUT', '/api/v1/routePoints/'.$routePoints->id, $editedRoutePoints);

        $this->assertApiResponse($editedRoutePoints);
    }

    /**
     * @test
     */
    public function testDeleteRoutePoints()
    {
        $routePoints = $this->makeRoutePoints();
        $this->json('DELETE', '/api/v1/routePoints/'.$routePoints->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/routePoints/'.$routePoints->id);

        $this->assertResponseStatus(404);
    }
}
