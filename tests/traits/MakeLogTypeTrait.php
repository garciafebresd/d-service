<?php

use Faker\Factory as Faker;
use App\Models\LogType;
use App\Repositories\LogTypeRepository;

trait MakeLogTypeTrait
{
    /**
     * Create fake instance of LogType and save it in database
     *
     * @param array $logTypeFields
     * @return LogType
     */
    public function makeLogType($logTypeFields = [])
    {
        /** @var LogTypeRepository $logTypeRepo */
        $logTypeRepo = App::make(LogTypeRepository::class);
        $theme = $this->fakeLogTypeData($logTypeFields);
        return $logTypeRepo->create($theme);
    }

    /**
     * Get fake instance of LogType
     *
     * @param array $logTypeFields
     * @return LogType
     */
    public function fakeLogType($logTypeFields = [])
    {
        return new LogType($this->fakeLogTypeData($logTypeFields));
    }

    /**
     * Get fake data of LogType
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLogTypeData($logTypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->word,
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $logTypeFields);
    }
}
