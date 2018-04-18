<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SystemLogApiTest extends TestCase
{
    use MakeSystemLogTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSystemLog()
    {
        $systemLog = $this->fakeSystemLogData();
        $this->json('POST', '/api/v1/systemLogs', $systemLog);

        $this->assertApiResponse($systemLog);
    }

    /**
     * @test
     */
    public function testReadSystemLog()
    {
        $systemLog = $this->makeSystemLog();
        $this->json('GET', '/api/v1/systemLogs/'.$systemLog->id);

        $this->assertApiResponse($systemLog->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSystemLog()
    {
        $systemLog = $this->makeSystemLog();
        $editedSystemLog = $this->fakeSystemLogData();

        $this->json('PUT', '/api/v1/systemLogs/'.$systemLog->id, $editedSystemLog);

        $this->assertApiResponse($editedSystemLog);
    }

    /**
     * @test
     */
    public function testDeleteSystemLog()
    {
        $systemLog = $this->makeSystemLog();
        $this->json('DELETE', '/api/v1/systemLogs/'.$systemLog->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/systemLogs/'.$systemLog->id);

        $this->assertResponseStatus(404);
    }
}
