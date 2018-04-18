<?php

use App\Models\SystemLog;
use App\Repositories\SystemLogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SystemLogRepositoryTest extends TestCase
{
    use MakeSystemLogTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SystemLogRepository
     */
    protected $systemLogRepo;

    public function setUp()
    {
        parent::setUp();
        $this->systemLogRepo = App::make(SystemLogRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSystemLog()
    {
        $systemLog = $this->fakeSystemLogData();
        $createdSystemLog = $this->systemLogRepo->create($systemLog);
        $createdSystemLog = $createdSystemLog->toArray();
        $this->assertArrayHasKey('id', $createdSystemLog);
        $this->assertNotNull($createdSystemLog['id'], 'Created SystemLog must have id specified');
        $this->assertNotNull(SystemLog::find($createdSystemLog['id']), 'SystemLog with given id must be in DB');
        $this->assertModelData($systemLog, $createdSystemLog);
    }

    /**
     * @test read
     */
    public function testReadSystemLog()
    {
        $systemLog = $this->makeSystemLog();
        $dbSystemLog = $this->systemLogRepo->find($systemLog->id);
        $dbSystemLog = $dbSystemLog->toArray();
        $this->assertModelData($systemLog->toArray(), $dbSystemLog);
    }

    /**
     * @test update
     */
    public function testUpdateSystemLog()
    {
        $systemLog = $this->makeSystemLog();
        $fakeSystemLog = $this->fakeSystemLogData();
        $updatedSystemLog = $this->systemLogRepo->update($fakeSystemLog, $systemLog->id);
        $this->assertModelData($fakeSystemLog, $updatedSystemLog->toArray());
        $dbSystemLog = $this->systemLogRepo->find($systemLog->id);
        $this->assertModelData($fakeSystemLog, $dbSystemLog->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSystemLog()
    {
        $systemLog = $this->makeSystemLog();
        $resp = $this->systemLogRepo->delete($systemLog->id);
        $this->assertTrue($resp);
        $this->assertNull(SystemLog::find($systemLog->id), 'SystemLog should not exist in DB');
    }
}
