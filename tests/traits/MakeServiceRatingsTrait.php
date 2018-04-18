<?php

use Faker\Factory as Faker;
use App\Models\ServiceRatings;
use App\Repositories\ServiceRatingsRepository;

trait MakeServiceRatingsTrait
{
    /**
     * Create fake instance of ServiceRatings and save it in database
     *
     * @param array $serviceRatingsFields
     * @return ServiceRatings
     */
    public function makeServiceRatings($serviceRatingsFields = [])
    {
        /** @var ServiceRatingsRepository $serviceRatingsRepo */
        $serviceRatingsRepo = App::make(ServiceRatingsRepository::class);
        $theme = $this->fakeServiceRatingsData($serviceRatingsFields);
        return $serviceRatingsRepo->create($theme);
    }

    /**
     * Get fake instance of ServiceRatings
     *
     * @param array $serviceRatingsFields
     * @return ServiceRatings
     */
    public function fakeServiceRatings($serviceRatingsFields = [])
    {
        return new ServiceRatings($this->fakeServiceRatingsData($serviceRatingsFields));
    }

    /**
     * Get fake data of ServiceRatings
     *
     * @param array $postFields
     * @return array
     */
    public function fakeServiceRatingsData($serviceRatingsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'json_info' => $fake->text,
            'calendar_service_id' => $fake->randomDigitNotNull,
            'client_id' => $fake->randomDigitNotNull,
            'description' => $fake->word,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $serviceRatingsFields);
    }
}
