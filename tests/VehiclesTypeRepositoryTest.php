<?php

use App\Models\VehiclesType;
use App\Repositories\VehiclesTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehiclesTypeRepositoryTest extends TestCase
{
    use MakeVehiclesTypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VehiclesTypeRepository
     */
    protected $vehiclesTypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->vehiclesTypeRepo = App::make(VehiclesTypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVehiclesType()
    {
        $vehiclesType = $this->fakeVehiclesTypeData();
        $createdVehiclesType = $this->vehiclesTypeRepo->create($vehiclesType);
        $createdVehiclesType = $createdVehiclesType->toArray();
        $this->assertArrayHasKey('id', $createdVehiclesType);
        $this->assertNotNull($createdVehiclesType['id'], 'Created VehiclesType must have id specified');
        $this->assertNotNull(VehiclesType::find($createdVehiclesType['id']), 'VehiclesType with given id must be in DB');
        $this->assertModelData($vehiclesType, $createdVehiclesType);
    }

    /**
     * @test read
     */
    public function testReadVehiclesType()
    {
        $vehiclesType = $this->makeVehiclesType();
        $dbVehiclesType = $this->vehiclesTypeRepo->find($vehiclesType->id);
        $dbVehiclesType = $dbVehiclesType->toArray();
        $this->assertModelData($vehiclesType->toArray(), $dbVehiclesType);
    }

    /**
     * @test update
     */
    public function testUpdateVehiclesType()
    {
        $vehiclesType = $this->makeVehiclesType();
        $fakeVehiclesType = $this->fakeVehiclesTypeData();
        $updatedVehiclesType = $this->vehiclesTypeRepo->update($fakeVehiclesType, $vehiclesType->id);
        $this->assertModelData($fakeVehiclesType, $updatedVehiclesType->toArray());
        $dbVehiclesType = $this->vehiclesTypeRepo->find($vehiclesType->id);
        $this->assertModelData($fakeVehiclesType, $dbVehiclesType->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVehiclesType()
    {
        $vehiclesType = $this->makeVehiclesType();
        $resp = $this->vehiclesTypeRepo->delete($vehiclesType->id);
        $this->assertTrue($resp);
        $this->assertNull(VehiclesType::find($vehiclesType->id), 'VehiclesType should not exist in DB');
    }
}
