<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RelClientPaymentMethodApiTest extends TestCase
{
    use MakeRelClientPaymentMethodTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRelClientPaymentMethod()
    {
        $relClientPaymentMethod = $this->fakeRelClientPaymentMethodData();
        $this->json('POST', '/api/v1/relClientPaymentMethods', $relClientPaymentMethod);

        $this->assertApiResponse($relClientPaymentMethod);
    }

    /**
     * @test
     */
    public function testReadRelClientPaymentMethod()
    {
        $relClientPaymentMethod = $this->makeRelClientPaymentMethod();
        $this->json('GET', '/api/v1/relClientPaymentMethods/'.$relClientPaymentMethod->id);

        $this->assertApiResponse($relClientPaymentMethod->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRelClientPaymentMethod()
    {
        $relClientPaymentMethod = $this->makeRelClientPaymentMethod();
        $editedRelClientPaymentMethod = $this->fakeRelClientPaymentMethodData();

        $this->json('PUT', '/api/v1/relClientPaymentMethods/'.$relClientPaymentMethod->id, $editedRelClientPaymentMethod);

        $this->assertApiResponse($editedRelClientPaymentMethod);
    }

    /**
     * @test
     */
    public function testDeleteRelClientPaymentMethod()
    {
        $relClientPaymentMethod = $this->makeRelClientPaymentMethod();
        $this->json('DELETE', '/api/v1/relClientPaymentMethods/'.$relClientPaymentMethod->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/relClientPaymentMethods/'.$relClientPaymentMethod->id);

        $this->assertResponseStatus(404);
    }
}
