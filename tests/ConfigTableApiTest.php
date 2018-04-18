<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConfigTableApiTest extends TestCase
{
    use MakeConfigTableTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateConfigTable()
    {
        $configTable = $this->fakeConfigTableData();
        $this->json('POST', '/api/v1/configTables', $configTable);

        $this->assertApiResponse($configTable);
    }

    /**
     * @test
     */
    public function testReadConfigTable()
    {
        $configTable = $this->makeConfigTable();
        $this->json('GET', '/api/v1/configTables/'.$configTable->id);

        $this->assertApiResponse($configTable->toArray());
    }

    /**
     * @test
     */
    public function testUpdateConfigTable()
    {
        $configTable = $this->makeConfigTable();
        $editedConfigTable = $this->fakeConfigTableData();

        $this->json('PUT', '/api/v1/configTables/'.$configTable->id, $editedConfigTable);

        $this->assertApiResponse($editedConfigTable);
    }

    /**
     * @test
     */
    public function testDeleteConfigTable()
    {
        $configTable = $this->makeConfigTable();
        $this->json('DELETE', '/api/v1/configTables/'.$configTable->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/configTables/'.$configTable->id);

        $this->assertResponseStatus(404);
    }
}
