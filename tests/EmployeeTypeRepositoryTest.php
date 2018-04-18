<?php

use App\Models\EmployeeType;
use App\Repositories\EmployeeTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeTypeRepositoryTest extends TestCase
{
    use MakeEmployeeTypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EmployeeTypeRepository
     */
    protected $employeeTypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->employeeTypeRepo = App::make(EmployeeTypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEmployeeType()
    {
        $employeeType = $this->fakeEmployeeTypeData();
        $createdEmployeeType = $this->employeeTypeRepo->create($employeeType);
        $createdEmployeeType = $createdEmployeeType->toArray();
        $this->assertArrayHasKey('id', $createdEmployeeType);
        $this->assertNotNull($createdEmployeeType['id'], 'Created EmployeeType must have id specified');
        $this->assertNotNull(EmployeeType::find($createdEmployeeType['id']), 'EmployeeType with given id must be in DB');
        $this->assertModelData($employeeType, $createdEmployeeType);
    }

    /**
     * @test read
     */
    public function testReadEmployeeType()
    {
        $employeeType = $this->makeEmployeeType();
        $dbEmployeeType = $this->employeeTypeRepo->find($employeeType->id);
        $dbEmployeeType = $dbEmployeeType->toArray();
        $this->assertModelData($employeeType->toArray(), $dbEmployeeType);
    }

    /**
     * @test update
     */
    public function testUpdateEmployeeType()
    {
        $employeeType = $this->makeEmployeeType();
        $fakeEmployeeType = $this->fakeEmployeeTypeData();
        $updatedEmployeeType = $this->employeeTypeRepo->update($fakeEmployeeType, $employeeType->id);
        $this->assertModelData($fakeEmployeeType, $updatedEmployeeType->toArray());
        $dbEmployeeType = $this->employeeTypeRepo->find($employeeType->id);
        $this->assertModelData($fakeEmployeeType, $dbEmployeeType->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEmployeeType()
    {
        $employeeType = $this->makeEmployeeType();
        $resp = $this->employeeTypeRepo->delete($employeeType->id);
        $this->assertTrue($resp);
        $this->assertNull(EmployeeType::find($employeeType->id), 'EmployeeType should not exist in DB');
    }
}
