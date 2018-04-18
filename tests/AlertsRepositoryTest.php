<?php

use App\Models\Alerts;
use App\Repositories\AlertsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AlertsRepositoryTest extends TestCase
{
    use MakeAlertsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AlertsRepository
     */
    protected $alertsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->alertsRepo = App::make(AlertsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAlerts()
    {
        $alerts = $this->fakeAlertsData();
        $createdAlerts = $this->alertsRepo->create($alerts);
        $createdAlerts = $createdAlerts->toArray();
        $this->assertArrayHasKey('id', $createdAlerts);
        $this->assertNotNull($createdAlerts['id'], 'Created Alerts must have id specified');
        $this->assertNotNull(Alerts::find($createdAlerts['id']), 'Alerts with given id must be in DB');
        $this->assertModelData($alerts, $createdAlerts);
    }

    /**
     * @test read
     */
    public function testReadAlerts()
    {
        $alerts = $this->makeAlerts();
        $dbAlerts = $this->alertsRepo->find($alerts->id);
        $dbAlerts = $dbAlerts->toArray();
        $this->assertModelData($alerts->toArray(), $dbAlerts);
    }

    /**
     * @test update
     */
    public function testUpdateAlerts()
    {
        $alerts = $this->makeAlerts();
        $fakeAlerts = $this->fakeAlertsData();
        $updatedAlerts = $this->alertsRepo->update($fakeAlerts, $alerts->id);
        $this->assertModelData($fakeAlerts, $updatedAlerts->toArray());
        $dbAlerts = $this->alertsRepo->find($alerts->id);
        $this->assertModelData($fakeAlerts, $dbAlerts->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAlerts()
    {
        $alerts = $this->makeAlerts();
        $resp = $this->alertsRepo->delete($alerts->id);
        $this->assertTrue($resp);
        $this->assertNull(Alerts::find($alerts->id), 'Alerts should not exist in DB');
    }
}
