<?php

use App\Models\PaymentMethodEnabled;
use App\Repositories\PaymentMethodEnabledRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaymentMethodEnabledRepositoryTest extends TestCase
{
    use MakePaymentMethodEnabledTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PaymentMethodEnabledRepository
     */
    protected $paymentMethodEnabledRepo;

    public function setUp()
    {
        parent::setUp();
        $this->paymentMethodEnabledRepo = App::make(PaymentMethodEnabledRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePaymentMethodEnabled()
    {
        $paymentMethodEnabled = $this->fakePaymentMethodEnabledData();
        $createdPaymentMethodEnabled = $this->paymentMethodEnabledRepo->create($paymentMethodEnabled);
        $createdPaymentMethodEnabled = $createdPaymentMethodEnabled->toArray();
        $this->assertArrayHasKey('id', $createdPaymentMethodEnabled);
        $this->assertNotNull($createdPaymentMethodEnabled['id'], 'Created PaymentMethodEnabled must have id specified');
        $this->assertNotNull(PaymentMethodEnabled::find($createdPaymentMethodEnabled['id']), 'PaymentMethodEnabled with given id must be in DB');
        $this->assertModelData($paymentMethodEnabled, $createdPaymentMethodEnabled);
    }

    /**
     * @test read
     */
    public function testReadPaymentMethodEnabled()
    {
        $paymentMethodEnabled = $this->makePaymentMethodEnabled();
        $dbPaymentMethodEnabled = $this->paymentMethodEnabledRepo->find($paymentMethodEnabled->id);
        $dbPaymentMethodEnabled = $dbPaymentMethodEnabled->toArray();
        $this->assertModelData($paymentMethodEnabled->toArray(), $dbPaymentMethodEnabled);
    }

    /**
     * @test update
     */
    public function testUpdatePaymentMethodEnabled()
    {
        $paymentMethodEnabled = $this->makePaymentMethodEnabled();
        $fakePaymentMethodEnabled = $this->fakePaymentMethodEnabledData();
        $updatedPaymentMethodEnabled = $this->paymentMethodEnabledRepo->update($fakePaymentMethodEnabled, $paymentMethodEnabled->id);
        $this->assertModelData($fakePaymentMethodEnabled, $updatedPaymentMethodEnabled->toArray());
        $dbPaymentMethodEnabled = $this->paymentMethodEnabledRepo->find($paymentMethodEnabled->id);
        $this->assertModelData($fakePaymentMethodEnabled, $dbPaymentMethodEnabled->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePaymentMethodEnabled()
    {
        $paymentMethodEnabled = $this->makePaymentMethodEnabled();
        $resp = $this->paymentMethodEnabledRepo->delete($paymentMethodEnabled->id);
        $this->assertTrue($resp);
        $this->assertNull(PaymentMethodEnabled::find($paymentMethodEnabled->id), 'PaymentMethodEnabled should not exist in DB');
    }
}
