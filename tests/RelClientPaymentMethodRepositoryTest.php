<?php

use App\Models\RelClientPaymentMethod;
use App\Repositories\RelClientPaymentMethodRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RelClientPaymentMethodRepositoryTest extends TestCase
{
    use MakeRelClientPaymentMethodTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RelClientPaymentMethodRepository
     */
    protected $relClientPaymentMethodRepo;

    public function setUp()
    {
        parent::setUp();
        $this->relClientPaymentMethodRepo = App::make(RelClientPaymentMethodRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRelClientPaymentMethod()
    {
        $relClientPaymentMethod = $this->fakeRelClientPaymentMethodData();
        $createdRelClientPaymentMethod = $this->relClientPaymentMethodRepo->create($relClientPaymentMethod);
        $createdRelClientPaymentMethod = $createdRelClientPaymentMethod->toArray();
        $this->assertArrayHasKey('id', $createdRelClientPaymentMethod);
        $this->assertNotNull($createdRelClientPaymentMethod['id'], 'Created RelClientPaymentMethod must have id specified');
        $this->assertNotNull(RelClientPaymentMethod::find($createdRelClientPaymentMethod['id']), 'RelClientPaymentMethod with given id must be in DB');
        $this->assertModelData($relClientPaymentMethod, $createdRelClientPaymentMethod);
    }

    /**
     * @test read
     */
    public function testReadRelClientPaymentMethod()
    {
        $relClientPaymentMethod = $this->makeRelClientPaymentMethod();
        $dbRelClientPaymentMethod = $this->relClientPaymentMethodRepo->find($relClientPaymentMethod->id);
        $dbRelClientPaymentMethod = $dbRelClientPaymentMethod->toArray();
        $this->assertModelData($relClientPaymentMethod->toArray(), $dbRelClientPaymentMethod);
    }

    /**
     * @test update
     */
    public function testUpdateRelClientPaymentMethod()
    {
        $relClientPaymentMethod = $this->makeRelClientPaymentMethod();
        $fakeRelClientPaymentMethod = $this->fakeRelClientPaymentMethodData();
        $updatedRelClientPaymentMethod = $this->relClientPaymentMethodRepo->update($fakeRelClientPaymentMethod, $relClientPaymentMethod->id);
        $this->assertModelData($fakeRelClientPaymentMethod, $updatedRelClientPaymentMethod->toArray());
        $dbRelClientPaymentMethod = $this->relClientPaymentMethodRepo->find($relClientPaymentMethod->id);
        $this->assertModelData($fakeRelClientPaymentMethod, $dbRelClientPaymentMethod->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRelClientPaymentMethod()
    {
        $relClientPaymentMethod = $this->makeRelClientPaymentMethod();
        $resp = $this->relClientPaymentMethodRepo->delete($relClientPaymentMethod->id);
        $this->assertTrue($resp);
        $this->assertNull(RelClientPaymentMethod::find($relClientPaymentMethod->id), 'RelClientPaymentMethod should not exist in DB');
    }
}
