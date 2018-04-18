<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LogTypeApiTest extends TestCase
{
    use MakeLogTypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLogType()
    {
        $logType = $this->fakeLogTypeData();
        $this->json('POST', '/api/v1/logTypes', $logType);

        $this->assertApiResponse($logType);
    }

    /**
     * @test
     */
    public function testReadLogType()
    {
        $logType = $this->makeLogType();
        $this->json('GET', '/api/v1/logTypes/'.$logType->id);

        $this->assertApiResponse($logType->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLogType()
    {
        $logType = $this->makeLogType();
        $editedLogType = $this->fakeLogTypeData();

        $this->json('PUT', '/api/v1/logTypes/'.$logType->id, $editedLogType);

        $this->assertApiResponse($editedLogType);
    }

    /**
     * @test
     */
    public function testDeleteLogType()
    {
        $logType = $this->makeLogType();
        $this->json('DELETE', '/api/v1/logTypes/'.$logType->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/logTypes/'.$logType->id);

        $this->assertResponseStatus(404);
    }
}
