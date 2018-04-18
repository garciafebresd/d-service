<?php

use App\Models\ServicePlan;
use App\Repositories\ServicePlanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ServicePlanRepositoryTest extends TestCase
{
    use MakeServicePlanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ServicePlanRepository
     */
    protected $servicePlanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->servicePlanRepo = App::make(ServicePlanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateServicePlan()
    {
        $servicePlan = $this->fakeServicePlanData();
        $createdServicePlan = $this->servicePlanRepo->create($servicePlan);
        $createdServicePlan = $createdServicePlan->toArray();
        $this->assertArrayHasKey('id', $createdServicePlan);
        $this->assertNotNull($createdServicePlan['id'], 'Created ServicePlan must have id specified');
        $this->assertNotNull(ServicePlan::find($createdServicePlan['id']), 'ServicePlan with given id must be in DB');
        $this->assertModelData($servicePlan, $createdServicePlan);
    }

    /**
     * @test read
     */
    public function testReadServicePlan()
    {
        $servicePlan = $this->makeServicePlan();
        $dbServicePlan = $this->servicePlanRepo->find($servicePlan->id);
        $dbServicePlan = $dbServicePlan->toArray();
        $this->assertModelData($servicePlan->toArray(), $dbServicePlan);
    }

    /**
     * @test update
     */
    public function testUpdateServicePlan()
    {
        $servicePlan = $this->makeServicePlan();
        $fakeServicePlan = $this->fakeServicePlanData();
        $updatedServicePlan = $this->servicePlanRepo->update($fakeServicePlan, $servicePlan->id);
        $this->assertModelData($fakeServicePlan, $updatedServicePlan->toArray());
        $dbServicePlan = $this->servicePlanRepo->find($servicePlan->id);
        $this->assertModelData($fakeServicePlan, $dbServicePlan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteServicePlan()
    {
        $servicePlan = $this->makeServicePlan();
        $resp = $this->servicePlanRepo->delete($servicePlan->id);
        $this->assertTrue($resp);
        $this->assertNull(ServicePlan::find($servicePlan->id), 'ServicePlan should not exist in DB');
    }
}
