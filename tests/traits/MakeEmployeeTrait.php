<?php

use Faker\Factory as Faker;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;

trait MakeEmployeeTrait
{
    /**
     * Create fake instance of Employee and save it in database
     *
     * @param array $employeeFields
     * @return Employee
     */
    public function makeEmployee($employeeFields = [])
    {
        /** @var EmployeeRepository $employeeRepo */
        $employeeRepo = App::make(EmployeeRepository::class);
        $theme = $this->fakeEmployeeData($employeeFields);
        return $employeeRepo->create($theme);
    }

    /**
     * Get fake instance of Employee
     *
     * @param array $employeeFields
     * @return Employee
     */
    public function fakeEmployee($employeeFields = [])
    {
        return new Employee($this->fakeEmployeeData($employeeFields));
    }

    /**
     * Get fake data of Employee
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEmployeeData($employeeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'name' => $fake->word,
            'last_name' => $fake->word,
            'password' => $fake->word,
            'email' => $fake->word,
            'json_permission' => $fake->text,
            'dni_number' => $fake->word,
            'employee_type_id' => $fake->randomDigitNotNull,
            'company_id' => $fake->randomDigitNotNull,
            'json_info' => $fake->text,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $employeeFields);
    }
}
