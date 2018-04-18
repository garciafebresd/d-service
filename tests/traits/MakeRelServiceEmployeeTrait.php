<?php

use Faker\Factory as Faker;
use App\Models\RelServiceEmployee;
use App\Repositories\RelServiceEmployeeRepository;

trait MakeRelServiceEmployeeTrait
{
    /**
     * Create fake instance of RelServiceEmployee and save it in database
     *
     * @param array $relServiceEmployeeFields
     * @return RelServiceEmployee
     */
    public function makeRelServiceEmployee($relServiceEmployeeFields = [])
    {
        /** @var RelServiceEmployeeRepository $relServiceEmployeeRepo */
        $relServiceEmployeeRepo = App::make(RelServiceEmployeeRepository::class);
        $theme = $this->fakeRelServiceEmployeeData($relServiceEmployeeFields);
        return $relServiceEmployeeRepo->create($theme);
    }

    /**
     * Get fake instance of RelServiceEmployee
     *
     * @param array $relServiceEmployeeFields
     * @return RelServiceEmployee
     */
    public function fakeRelServiceEmployee($relServiceEmployeeFields = [])
    {
        return new RelServiceEmployee($this->fakeRelServiceEmployeeData($relServiceEmployeeFields));
    }

    /**
     * Get fake data of RelServiceEmployee
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRelServiceEmployeeData($relServiceEmployeeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'service_id' => $fake->randomDigitNotNull,
            'employee_id' => $fake->randomDigitNotNull,
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $relServiceEmployeeFields);
    }
}
