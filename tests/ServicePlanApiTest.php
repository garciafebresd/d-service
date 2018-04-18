<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ServicePlanApiTest extends TestCase
{
    use MakeServicePlanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateServicePlan()
    {
        $servicePlan = $this->fakeServicePlanData();
        $this->json('POST', '/api/v1/servicePlans', $servicePlan);

        $this->assertApiResponse($servicePlan);
    }

    /**
     * @test
     */
    public function testReadServicePlan()
    {
        $servicePlan = $this->makeServicePlan();
        $this->json('GET', '/api/v1/servicePlans/'.$servicePlan->id);

        $this->assertApiResponse($servicePlan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateServicePlan()
    {
        $servicePlan = $this->makeServicePlan();
        $editedServicePlan = $this->fakeServicePlanData();

        $this->json('PUT', '/api/v1/servicePlans/'.$servicePlan->id, $editedServicePlan);

        $this->assertApiResponse($editedServicePlan);
    }

    /**
     * @test
     */
    public function testDeleteServicePlan()
    {
        $servicePlan = $this->makeServicePlan();
        $this->json('DELETE', '/api/v1/servicePlans/'.$servicePlan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/servicePlans/'.$servicePlan->id);

        $this->assertResponseStatus(404);
    }
}
