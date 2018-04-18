<?php

use App\Models\Vehicles;
use App\Repositories\VehiclesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehiclesRepositoryTest extends TestCase
{
    use MakeVehiclesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VehiclesRepository
     */
    protected $vehiclesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->vehiclesRepo = App::make(VehiclesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVehicles()
    {
        $vehicles = $this->fakeVehiclesData();
        $createdVehicles = $this->vehiclesRepo->create($vehicles);
        $createdVehicles = $createdVehicles->toArray();
        $this->assertArrayHasKey('id', $createdVehicles);
        $this->assertNotNull($createdVehicles['id'], 'Created Vehicles must have id specified');
        $this->assertNotNull(Vehicles::find($createdVehicles['id']), 'Vehicles with given id must be in DB');
        $this->assertModelData($vehicles, $createdVehicles);
    }

    /**
     * @test read
     */
    public function testReadVehicles()
    {
        $vehicles = $this->makeVehicles();
        $dbVehicles = $this->vehiclesRepo->find($vehicles->id);
        $dbVehicles = $dbVehicles->toArray();
        $this->assertModelData($vehicles->toArray(), $dbVehicles);
    }

    /**
     * @test update
     */
    public function testUpdateVehicles()
    {
        $vehicles = $this->makeVehicles();
        $fakeVehicles = $this->fakeVehiclesData();
        $updatedVehicles = $this->vehiclesRepo->update($fakeVehicles, $vehicles->id);
        $this->assertModelData($fakeVehicles, $updatedVehicles->toArray());
        $dbVehicles = $this->vehiclesRepo->find($vehicles->id);
        $this->assertModelData($fakeVehicles, $dbVehicles->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVehicles()
    {
        $vehicles = $this->makeVehicles();
        $resp = $this->vehiclesRepo->delete($vehicles->id);
        $this->assertTrue($resp);
        $this->assertNull(Vehicles::find($vehicles->id), 'Vehicles should not exist in DB');
    }
}
