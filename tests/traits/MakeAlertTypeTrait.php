<?php

use Faker\Factory as Faker;
use App\Models\AlertType;
use App\Repositories\AlertTypeRepository;

trait MakeAlertTypeTrait
{
    /**
     * Create fake instance of AlertType and save it in database
     *
     * @param array $alertTypeFields
     * @return AlertType
     */
    public function makeAlertType($alertTypeFields = [])
    {
        /** @var AlertTypeRepository $alertTypeRepo */
        $alertTypeRepo = App::make(AlertTypeRepository::class);
        $theme = $this->fakeAlertTypeData($alertTypeFields);
        return $alertTypeRepo->create($theme);
    }

    /**
     * Get fake instance of AlertType
     *
     * @param array $alertTypeFields
     * @return AlertType
     */
    public function fakeAlertType($alertTypeFields = [])
    {
        return new AlertType($this->fakeAlertTypeData($alertTypeFields));
    }

    /**
     * Get fake data of AlertType
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAlertTypeData($alertTypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'name' => $fake->word,
            'description' => $fake->word,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $alertTypeFields);
    }
}
