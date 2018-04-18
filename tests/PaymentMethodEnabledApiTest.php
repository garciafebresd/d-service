<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaymentMethodEnabledApiTest extends TestCase
{
    use MakePaymentMethodEnabledTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePaymentMethodEnabled()
    {
        $paymentMethodEnabled = $this->fakePaymentMethodEnabledData();
        $this->json('POST', '/api/v1/paymentMethodEnableds', $paymentMethodEnabled);

        $this->assertApiResponse($paymentMethodEnabled);
    }

    /**
     * @test
     */
    public function testReadPaymentMethodEnabled()
    {
        $paymentMethodEnabled = $this->makePaymentMethodEnabled();
        $this->json('GET', '/api/v1/paymentMethodEnableds/'.$paymentMethodEnabled->id);

        $this->assertApiResponse($paymentMethodEnabled->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePaymentMethodEnabled()
    {
        $paymentMethodEnabled = $this->makePaymentMethodEnabled();
        $editedPaymentMethodEnabled = $this->fakePaymentMethodEnabledData();

        $this->json('PUT', '/api/v1/paymentMethodEnableds/'.$paymentMethodEnabled->id, $editedPaymentMethodEnabled);

        $this->assertApiResponse($editedPaymentMethodEnabled);
    }

    /**
     * @test
     */
    public function testDeletePaymentMethodEnabled()
    {
        $paymentMethodEnabled = $this->makePaymentMethodEnabled();
        $this->json('DELETE', '/api/v1/paymentMethodEnableds/'.$paymentMethodEnabled->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/paymentMethodEnableds/'.$paymentMethodEnabled->id);

        $this->assertResponseStatus(404);
    }
}
