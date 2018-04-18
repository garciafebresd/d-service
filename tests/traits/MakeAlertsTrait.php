<?php

use Faker\Factory as Faker;
use App\Models\Alerts;
use App\Repositories\AlertsRepository;

trait MakeAlertsTrait
{
    /**
     * Create fake instance of Alerts and save it in database
     *
     * @param array $alertsFields
     * @return Alerts
     */
    public function makeAlerts($alertsFields = [])
    {
        /** @var AlertsRepository $alertsRepo */
        $alertsRepo = App::make(AlertsRepository::class);
        $theme = $this->fakeAlertsData($alertsFields);
        return $alertsRepo->create($theme);
    }

    /**
     * Get fake instance of Alerts
     *
     * @param array $alertsFields
     * @return Alerts
     */
    public function fakeAlerts($alertsFields = [])
    {
        return new Alerts($this->fakeAlertsData($alertsFields));
    }

    /**
     * Get fake data of Alerts
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAlertsData($alertsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'latitude' => $fake->randomDigitNotNull,
            'longitude' => $fake->randomDigitNotNull,
            'alert_type_id' => $fake->randomDigitNotNull,
            'json_info' => $fake->text,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $alertsFields);
    }
}
