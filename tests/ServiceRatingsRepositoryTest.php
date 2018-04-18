<?php

use App\Models\ServiceRatings;
use App\Repositories\ServiceRatingsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ServiceRatingsRepositoryTest extends TestCase
{
    use MakeServiceRatingsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ServiceRatingsRepository
     */
    protected $serviceRatingsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->serviceRatingsRepo = App::make(ServiceRatingsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateServiceRatings()
    {
        $serviceRatings = $this->fakeServiceRatingsData();
        $createdServiceRatings = $this->serviceRatingsRepo->create($serviceRatings);
        $createdServiceRatings = $createdServiceRatings->toArray();
        $this->assertArrayHasKey('id', $createdServiceRatings);
        $this->assertNotNull($createdServiceRatings['id'], 'Created ServiceRatings must have id specified');
        $this->assertNotNull(ServiceRatings::find($createdServiceRatings['id']), 'ServiceRatings with given id must be in DB');
        $this->assertModelData($serviceRatings, $createdServiceRatings);
    }

    /**
     * @test read
     */
    public function testReadServiceRatings()
    {
        $serviceRatings = $this->makeServiceRatings();
        $dbServiceRatings = $this->serviceRatingsRepo->find($serviceRatings->id);
        $dbServiceRatings = $dbServiceRatings->toArray();
        $this->assertModelData($serviceRatings->toArray(), $dbServiceRatings);
    }

    /**
     * @test update
     */
    public function testUpdateServiceRatings()
    {
        $serviceRatings = $this->makeServiceRatings();
        $fakeServiceRatings = $this->fakeServiceRatingsData();
        $updatedServiceRatings = $this->serviceRatingsRepo->update($fakeServiceRatings, $serviceRatings->id);
        $this->assertModelData($fakeServiceRatings, $updatedServiceRatings->toArray());
        $dbServiceRatings = $this->serviceRatingsRepo->find($serviceRatings->id);
        $this->assertModelData($fakeServiceRatings, $dbServiceRatings->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteServiceRatings()
    {
        $serviceRatings = $this->makeServiceRatings();
        $resp = $this->serviceRatingsRepo->delete($serviceRatings->id);
        $this->assertTrue($resp);
        $this->assertNull(ServiceRatings::find($serviceRatings->id), 'ServiceRatings should not exist in DB');
    }
}
