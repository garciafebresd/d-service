<?php

use Faker\Factory as Faker;
use App\Models\ServicePlan;
use App\Repositories\ServicePlanRepository;

trait MakeServicePlanTrait
{
    /**
     * Create fake instance of ServicePlan and save it in database
     *
     * @param array $servicePlanFields
     * @return ServicePlan
     */
    public function makeServicePlan($servicePlanFields = [])
    {
        /** @var ServicePlanRepository $servicePlanRepo */
        $servicePlanRepo = App::make(ServicePlanRepository::class);
        $theme = $this->fakeServicePlanData($servicePlanFields);
        return $servicePlanRepo->create($theme);
    }

    /**
     * Get fake instance of ServicePlan
     *
     * @param array $servicePlanFields
     * @return ServicePlan
     */
    public function fakeServicePlan($servicePlanFields = [])
    {
        return new ServicePlan($this->fakeServicePlanData($servicePlanFields));
    }

    /**
     * Get fake data of ServicePlan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeServicePlanData($servicePlanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'client_id' => $fake->randomDigitNotNull,
            'service_id' => $fake->randomDigitNotNull,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $servicePlanFields);
    }
}
