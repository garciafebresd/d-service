<?php

use App\Models\LogType;
use App\Repositories\LogTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LogTypeRepositoryTest extends TestCase
{
    use MakeLogTypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LogTypeRepository
     */
    protected $logTypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->logTypeRepo = App::make(LogTypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLogType()
    {
        $logType = $this->fakeLogTypeData();
        $createdLogType = $this->logTypeRepo->create($logType);
        $createdLogType = $createdLogType->toArray();
        $this->assertArrayHasKey('id', $createdLogType);
        $this->assertNotNull($createdLogType['id'], 'Created LogType must have id specified');
        $this->assertNotNull(LogType::find($createdLogType['id']), 'LogType with given id must be in DB');
        $this->assertModelData($logType, $createdLogType);
    }

    /**
     * @test read
     */
    public function testReadLogType()
    {
        $logType = $this->makeLogType();
        $dbLogType = $this->logTypeRepo->find($logType->id);
        $dbLogType = $dbLogType->toArray();
        $this->assertModelData($logType->toArray(), $dbLogType);
    }

    /**
     * @test update
     */
    public function testUpdateLogType()
    {
        $logType = $this->makeLogType();
        $fakeLogType = $this->fakeLogTypeData();
        $updatedLogType = $this->logTypeRepo->update($fakeLogType, $logType->id);
        $this->assertModelData($fakeLogType, $updatedLogType->toArray());
        $dbLogType = $this->logTypeRepo->find($logType->id);
        $this->assertModelData($fakeLogType, $dbLogType->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLogType()
    {
        $logType = $this->makeLogType();
        $resp = $this->logTypeRepo->delete($logType->id);
        $this->assertTrue($resp);
        $this->assertNull(LogType::find($logType->id), 'LogType should not exist in DB');
    }
}
