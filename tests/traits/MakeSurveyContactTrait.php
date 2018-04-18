<?php

use Faker\Factory as Faker;
use App\Models\SurveyContact;
use App\Repositories\SurveyContactRepository;

trait MakeSurveyContactTrait
{
    /**
     * Create fake instance of SurveyContact and save it in database
     *
     * @param array $surveyContactFields
     * @return SurveyContact
     */
    public function makeSurveyContact($surveyContactFields = [])
    {
        /** @var SurveyContactRepository $surveyContactRepo */
        $surveyContactRepo = App::make(SurveyContactRepository::class);
        $theme = $this->fakeSurveyContactData($surveyContactFields);
        return $surveyContactRepo->create($theme);
    }

    /**
     * Get fake instance of SurveyContact
     *
     * @param array $surveyContactFields
     * @return SurveyContact
     */
    public function fakeSurveyContact($surveyContactFields = [])
    {
        return new SurveyContact($this->fakeSurveyContactData($surveyContactFields));
    }

    /**
     * Get fake data of SurveyContact
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSurveyContactData($surveyContactFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'survey_id' => $fake->randomDigitNotNull,
            'contact_info' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'update_at' => $fake->date('Y-m-d H:i:s'),
            'json_info' => $fake->text,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $surveyContactFields);
    }
}
