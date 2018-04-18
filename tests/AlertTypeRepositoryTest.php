<?php

use App\Models\AlertType;
use App\Repositories\AlertTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AlertTypeRepositoryTest extends TestCase
{
    use MakeAlertTypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AlertTypeRepository
     */
    protected $alertTypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->alertTypeRepo = App::make(AlertTypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAlertType()
    {
        $alertType = $this->fakeAlertTypeData();
        $createdAlertType = $this->alertTypeRepo->create($alertType);
        $createdAlertType = $createdAlertType->toArray();
        $this->assertArrayHasKey('id', $createdAlertType);
        $this->assertNotNull($createdAlertType['id'], 'Created AlertType must have id specified');
        $this->assertNotNull(AlertType::find($createdAlertType['id']), 'AlertType with given id must be in DB');
        $this->assertModelData($alertType, $createdAlertType);
    }

    /**
     * @test read
     */
    public function testReadAlertType()
    {
        $alertType = $this->makeAlertType();
        $dbAlertType = $this->alertTypeRepo->find($alertType->id);
        $dbAlertType = $dbAlertType->toArray();
        $this->assertModelData($alertType->toArray(), $dbAlertType);
    }

    /**
     * @test update
     */
    public function testUpdateAlertType()
    {
        $alertType = $this->makeAlertType();
        $fakeAlertType = $this->fakeAlertTypeData();
        $updatedAlertType = $this->alertTypeRepo->update($fakeAlertType, $alertType->id);
        $this->assertModelData($fakeAlertType, $updatedAlertType->toArray());
        $dbAlertType = $this->alertTypeRepo->find($alertType->id);
        $this->assertModelData($fakeAlertType, $dbAlertType->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAlertType()
    {
        $alertType = $this->makeAlertType();
        $resp = $this->alertTypeRepo->delete($alertType->id);
        $this->assertTrue($resp);
        $this->assertNull(AlertType::find($alertType->id), 'AlertType should not exist in DB');
    }
}
