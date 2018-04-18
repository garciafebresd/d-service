<?php

use App\Models\ClientType;
use App\Repositories\ClientTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientTypeRepositoryTest extends TestCase
{
    use MakeClientTypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ClientTypeRepository
     */
    protected $clientTypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->clientTypeRepo = App::make(ClientTypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateClientType()
    {
        $clientType = $this->fakeClientTypeData();
        $createdClientType = $this->clientTypeRepo->create($clientType);
        $createdClientType = $createdClientType->toArray();
        $this->assertArrayHasKey('id', $createdClientType);
        $this->assertNotNull($createdClientType['id'], 'Created ClientType must have id specified');
        $this->assertNotNull(ClientType::find($createdClientType['id']), 'ClientType with given id must be in DB');
        $this->assertModelData($clientType, $createdClientType);
    }

    /**
     * @test read
     */
    public function testReadClientType()
    {
        $clientType = $this->makeClientType();
        $dbClientType = $this->clientTypeRepo->find($clientType->id);
        $dbClientType = $dbClientType->toArray();
        $this->assertModelData($clientType->toArray(), $dbClientType);
    }

    /**
     * @test update
     */
    public function testUpdateClientType()
    {
        $clientType = $this->makeClientType();
        $fakeClientType = $this->fakeClientTypeData();
        $updatedClientType = $this->clientTypeRepo->update($fakeClientType, $clientType->id);
        $this->assertModelData($fakeClientType, $updatedClientType->toArray());
        $dbClientType = $this->clientTypeRepo->find($clientType->id);
        $this->assertModelData($fakeClientType, $dbClientType->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteClientType()
    {
        $clientType = $this->makeClientType();
        $resp = $this->clientTypeRepo->delete($clientType->id);
        $this->assertTrue($resp);
        $this->assertNull(ClientType::find($clientType->id), 'ClientType should not exist in DB');
    }
}
