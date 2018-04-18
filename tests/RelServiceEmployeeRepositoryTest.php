<?php

use App\Models\RelServiceEmployee;
use App\Repositories\RelServiceEmployeeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RelServiceEmployeeRepositoryTest extends TestCase
{
    use MakeRelServiceEmployeeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RelServiceEmployeeRepository
     */
    protected $relServiceEmployeeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->relServiceEmployeeRepo = App::make(RelServiceEmployeeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRelServiceEmployee()
    {
        $relServiceEmployee = $this->fakeRelServiceEmployeeData();
        $createdRelServiceEmployee = $this->relServiceEmployeeRepo->create($relServiceEmployee);
        $createdRelServiceEmployee = $createdRelServiceEmployee->toArray();
        $this->assertArrayHasKey('id', $createdRelServiceEmployee);
        $this->assertNotNull($createdRelServiceEmployee['id'], 'Created RelServiceEmployee must have id specified');
        $this->assertNotNull(RelServiceEmployee::find($createdRelServiceEmployee['id']), 'RelServiceEmployee with given id must be in DB');
        $this->assertModelData($relServiceEmployee, $createdRelServiceEmployee);
    }

    /**
     * @test read
     */
    public function testReadRelServiceEmployee()
    {
        $relServiceEmployee = $this->makeRelServiceEmployee();
        $dbRelServiceEmployee = $this->relServiceEmployeeRepo->find($relServiceEmployee->id);
        $dbRelServiceEmployee = $dbRelServiceEmployee->toArray();
        $this->assertModelData($relServiceEmployee->toArray(), $dbRelServiceEmployee);
    }

    /**
     * @test update
     */
    public function testUpdateRelServiceEmployee()
    {
        $relServiceEmployee = $this->makeRelServiceEmployee();
        $fakeRelServiceEmployee = $this->fakeRelServiceEmployeeData();
        $updatedRelServiceEmployee = $this->relServiceEmployeeRepo->update($fakeRelServiceEmployee, $relServiceEmployee->id);
        $this->assertModelData($fakeRelServiceEmployee, $updatedRelServiceEmployee->toArray());
        $dbRelServiceEmployee = $this->relServiceEmployeeRepo->find($relServiceEmployee->id);
        $this->assertModelData($fakeRelServiceEmployee, $dbRelServiceEmployee->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRelServiceEmployee()
    {
        $relServiceEmployee = $this->makeRelServiceEmployee();
        $resp = $this->relServiceEmployeeRepo->delete($relServiceEmployee->id);
        $this->assertTrue($resp);
        $this->assertNull(RelServiceEmployee::find($relServiceEmployee->id), 'RelServiceEmployee should not exist in DB');
    }
}
