<?php

use App\Models\SurveyContact;
use App\Repositories\SurveyContactRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SurveyContactRepositoryTest extends TestCase
{
    use MakeSurveyContactTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SurveyContactRepository
     */
    protected $surveyContactRepo;

    public function setUp()
    {
        parent::setUp();
        $this->surveyContactRepo = App::make(SurveyContactRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSurveyContact()
    {
        $surveyContact = $this->fakeSurveyContactData();
        $createdSurveyContact = $this->surveyContactRepo->create($surveyContact);
        $createdSurveyContact = $createdSurveyContact->toArray();
        $this->assertArrayHasKey('id', $createdSurveyContact);
        $this->assertNotNull($createdSurveyContact['id'], 'Created SurveyContact must have id specified');
        $this->assertNotNull(SurveyContact::find($createdSurveyContact['id']), 'SurveyContact with given id must be in DB');
        $this->assertModelData($surveyContact, $createdSurveyContact);
    }

    /**
     * @test read
     */
    public function testReadSurveyContact()
    {
        $surveyContact = $this->makeSurveyContact();
        $dbSurveyContact = $this->surveyContactRepo->find($surveyContact->id);
        $dbSurveyContact = $dbSurveyContact->toArray();
        $this->assertModelData($surveyContact->toArray(), $dbSurveyContact);
    }

    /**
     * @test update
     */
    public function testUpdateSurveyContact()
    {
        $surveyContact = $this->makeSurveyContact();
        $fakeSurveyContact = $this->fakeSurveyContactData();
        $updatedSurveyContact = $this->surveyContactRepo->update($fakeSurveyContact, $surveyContact->id);
        $this->assertModelData($fakeSurveyContact, $updatedSurveyContact->toArray());
        $dbSurveyContact = $this->surveyContactRepo->find($surveyContact->id);
        $this->assertModelData($fakeSurveyContact, $dbSurveyContact->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSurveyContact()
    {
        $surveyContact = $this->makeSurveyContact();
        $resp = $this->surveyContactRepo->delete($surveyContact->id);
        $this->assertTrue($resp);
        $this->assertNull(SurveyContact::find($surveyContact->id), 'SurveyContact should not exist in DB');
    }
}
