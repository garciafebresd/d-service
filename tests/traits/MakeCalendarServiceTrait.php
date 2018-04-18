<?php

use Faker\Factory as Faker;
use App\Models\CalendarService;
use App\Repositories\CalendarServiceRepository;

trait MakeCalendarServiceTrait
{
    /**
     * Create fake instance of CalendarService and save it in database
     *
     * @param array $calendarServiceFields
     * @return CalendarService
     */
    public function makeCalendarService($calendarServiceFields = [])
    {
        /** @var CalendarServiceRepository $calendarServiceRepo */
        $calendarServiceRepo = App::make(CalendarServiceRepository::class);
        $theme = $this->fakeCalendarServiceData($calendarServiceFields);
        return $calendarServiceRepo->create($theme);
    }

    /**
     * Get fake instance of CalendarService
     *
     * @param array $calendarServiceFields
     * @return CalendarService
     */
    public function fakeCalendarService($calendarServiceFields = [])
    {
        return new CalendarService($this->fakeCalendarServiceData($calendarServiceFields));
    }

    /**
     * Get fake data of CalendarService
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCalendarServiceData($calendarServiceFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'service_date' => $fake->date('Y-m-d H:i:s'),
            'client_id' => $fake->randomDigitNotNull,
            'employee_id' => $fake->randomDigitNotNull,
            'service_id' => $fake->randomDigitNotNull,
            'payment_method_id' => $fake->randomDigitNotNull,
            'description' => $fake->word,
            'json_info' => $fake->text,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $calendarServiceFields);
    }
}
