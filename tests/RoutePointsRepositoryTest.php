<?php

use App\Models\RoutePoints;
use App\Repositories\RoutePointsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoutePointsRepositoryTest extends TestCase
{
    use MakeRoutePointsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RoutePointsRepository
     */
    protected $routePointsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->routePointsRepo = App::make(RoutePointsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRoutePoints()
    {
        $routePoints = $this->fakeRoutePointsData();
        $createdRoutePoints = $this->routePointsRepo->create($routePoints);
        $createdRoutePoints = $createdRoutePoints->toArray();
        $this->assertArrayHasKey('id', $createdRoutePoints);
        $this->assertNotNull($createdRoutePoints['id'], 'Created RoutePoints must have id specified');
        $this->assertNotNull(RoutePoints::find($createdRoutePoints['id']), 'RoutePoints with given id must be in DB');
        $this->assertModelData($routePoints, $createdRoutePoints);
    }

    /**
     * @test read
     */
    public function testReadRoutePoints()
    {
        $routePoints = $this->makeRoutePoints();
        $dbRoutePoints = $this->routePointsRepo->find($routePoints->id);
        $dbRoutePoints = $dbRoutePoints->toArray();
        $this->assertModelData($routePoints->toArray(), $dbRoutePoints);
    }

    /**
     * @test update
     */
    public function testUpdateRoutePoints()
    {
        $routePoints = $this->makeRoutePoints();
        $fakeRoutePoints = $this->fakeRoutePointsData();
        $updatedRoutePoints = $this->routePointsRepo->update($fakeRoutePoints, $routePoints->id);
        $this->assertModelData($fakeRoutePoints, $updatedRoutePoints->toArray());
        $dbRoutePoints = $this->routePointsRepo->find($routePoints->id);
        $this->assertModelData($fakeRoutePoints, $dbRoutePoints->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRoutePoints()
    {
        $routePoints = $this->makeRoutePoints();
        $resp = $this->routePointsRepo->delete($routePoints->id);
        $this->assertTrue($resp);
        $this->assertNull(RoutePoints::find($routePoints->id), 'RoutePoints should not exist in DB');
    }
}
