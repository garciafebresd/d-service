<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ServiceRatingsApiTest extends TestCase
{
    use MakeServiceRatingsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateServiceRatings()
    {
        $serviceRatings = $this->fakeServiceRatingsData();
        $this->json('POST', '/api/v1/serviceRatings', $serviceRatings);

        $this->assertApiResponse($serviceRatings);
    }

    /**
     * @test
     */
    public function testReadServiceRatings()
    {
        $serviceRatings = $this->makeServiceRatings();
        $this->json('GET', '/api/v1/serviceRatings/'.$serviceRatings->id);

        $this->assertApiResponse($serviceRatings->toArray());
    }

    /**
     * @test
     */
    public function testUpdateServiceRatings()
    {
        $serviceRatings = $this->makeServiceRatings();
        $editedServiceRatings = $this->fakeServiceRatingsData();

        $this->json('PUT', '/api/v1/serviceRatings/'.$serviceRatings->id, $editedServiceRatings);

        $this->assertApiResponse($editedServiceRatings);
    }

    /**
     * @test
     */
    public function testDeleteServiceRatings()
    {
        $serviceRatings = $this->makeServiceRatings();
        $this->json('DELETE', '/api/v1/serviceRatings/'.$serviceRatings->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/serviceRatings/'.$serviceRatings->id);

        $this->assertResponseStatus(404);
    }
}
