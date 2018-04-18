<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SurveyContactApiTest extends TestCase
{
    use MakeSurveyContactTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSurveyContact()
    {
        $surveyContact = $this->fakeSurveyContactData();
        $this->json('POST', '/api/v1/surveyContacts', $surveyContact);

        $this->assertApiResponse($surveyContact);
    }

    /**
     * @test
     */
    public function testReadSurveyContact()
    {
        $surveyContact = $this->makeSurveyContact();
        $this->json('GET', '/api/v1/surveyContacts/'.$surveyContact->id);

        $this->assertApiResponse($surveyContact->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSurveyContact()
    {
        $surveyContact = $this->makeSurveyContact();
        $editedSurveyContact = $this->fakeSurveyContactData();

        $this->json('PUT', '/api/v1/surveyContacts/'.$surveyContact->id, $editedSurveyContact);

        $this->assertApiResponse($editedSurveyContact);
    }

    /**
     * @test
     */
    public function testDeleteSurveyContact()
    {
        $surveyContact = $this->makeSurveyContact();
        $this->json('DELETE', '/api/v1/surveyContacts/'.$surveyContact->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/surveyContacts/'.$surveyContact->id);

        $this->assertResponseStatus(404);
    }
}
