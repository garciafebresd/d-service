<?php

use Faker\Factory as Faker;
use App\Models\SystemLog;
use App\Repositories\SystemLogRepository;

trait MakeSystemLogTrait
{
    /**
     * Create fake instance of SystemLog and save it in database
     *
     * @param array $systemLogFields
     * @return SystemLog
     */
    public function makeSystemLog($systemLogFields = [])
    {
        /** @var SystemLogRepository $systemLogRepo */
        $systemLogRepo = App::make(SystemLogRepository::class);
        $theme = $this->fakeSystemLogData($systemLogFields);
        return $systemLogRepo->create($theme);
    }

    /**
     * Get fake instance of SystemLog
     *
     * @param array $systemLogFields
     * @return SystemLog
     */
    public function fakeSystemLog($systemLogFields = [])
    {
        return new SystemLog($this->fakeSystemLogData($systemLogFields));
    }

    /**
     * Get fake data of SystemLog
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSystemLogData($systemLogFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->randomDigitNotNull,
            'description' => $fake->word,
            'log_type_id' => $fake->randomDigitNotNull,
            'employee_id' => $fake->randomDigitNotNull,
            'client_id' => $fake->randomDigitNotNull,
            'user_id' => $fake->randomDigitNotNull,
            'json_info' => $fake->text,
            'ip_address' => $fake->word,
            'uuid' => $fake->word,
            'imei' => $fake->word,
            'latitude' => $fake->word,
            'longitude' => $fake->word,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $systemLogFields);
    }
}
