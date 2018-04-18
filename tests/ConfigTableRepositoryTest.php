<?php

use App\Models\ConfigTable;
use App\Repositories\ConfigTableRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConfigTableRepositoryTest extends TestCase
{
    use MakeConfigTableTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ConfigTableRepository
     */
    protected $configTableRepo;

    public function setUp()
    {
        parent::setUp();
        $this->configTableRepo = App::make(ConfigTableRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateConfigTable()
    {
        $configTable = $this->fakeConfigTableData();
        $createdConfigTable = $this->configTableRepo->create($configTable);
        $createdConfigTable = $createdConfigTable->toArray();
        $this->assertArrayHasKey('id', $createdConfigTable);
        $this->assertNotNull($createdConfigTable['id'], 'Created ConfigTable must have id specified');
        $this->assertNotNull(ConfigTable::find($createdConfigTable['id']), 'ConfigTable with given id must be in DB');
        $this->assertModelData($configTable, $createdConfigTable);
    }

    /**
     * @test read
     */
    public function testReadConfigTable()
    {
        $configTable = $this->makeConfigTable();
        $dbConfigTable = $this->configTableRepo->find($configTable->id);
        $dbConfigTable = $dbConfigTable->toArray();
        $this->assertModelData($configTable->toArray(), $dbConfigTable);
    }

    /**
     * @test update
     */
    public function testUpdateConfigTable()
    {
        $configTable = $this->makeConfigTable();
        $fakeConfigTable = $this->fakeConfigTableData();
        $updatedConfigTable = $this->configTableRepo->update($fakeConfigTable, $configTable->id);
        $this->assertModelData($fakeConfigTable, $updatedConfigTable->toArray());
        $dbConfigTable = $this->configTableRepo->find($configTable->id);
        $this->assertModelData($fakeConfigTable, $dbConfigTable->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteConfigTable()
    {
        $configTable = $this->makeConfigTable();
        $resp = $this->configTableRepo->delete($configTable->id);
        $this->assertTrue($resp);
        $this->assertNull(ConfigTable::find($configTable->id), 'ConfigTable should not exist in DB');
    }
}
