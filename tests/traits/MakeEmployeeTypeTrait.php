<?php

use Faker\Factory as Faker;
use App\Models\EmployeeType;
use App\Repositories\EmployeeTypeRepository;

trait MakeEmployeeTypeTrait
{
    /**
     * Create fake instance of EmployeeType and save it in database
     *
     * @param array $employeeTypeFields
     * @return EmployeeType
     */
    public function makeEmployeeType($employeeTypeFields = [])
    {
        /** @var EmployeeTypeRepository $employeeTypeRepo */
        $employeeTypeRepo = App::make(EmployeeTypeRepository::class);
        $theme = $this->fakeEmployeeTypeData($employeeTypeFields);
        return $employeeTypeRepo->create($theme);
    }

    /**
     * Get fake instance of EmployeeType
     *
     * @param array $employeeTypeFields
     * @return EmployeeType
     */
    public function fakeEmployeeType($employeeTypeFields = [])
    {
        return new EmployeeType($this->fakeEmployeeTypeData($employeeTypeFields));
    }

    /**
     * Get fake data of EmployeeType
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEmployeeTypeData($employeeTypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->word,
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $employeeTypeFields);
    }
}
