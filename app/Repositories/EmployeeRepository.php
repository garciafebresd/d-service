<?php

namespace App\Repositories;

use App\Models\Employee;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EmployeeRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:58 am UTC
 *
 * @method Employee findWithoutFail($id, $columns = ['*'])
 * @method Employee find($id, $columns = ['*'])
 * @method Employee first($columns = ['*'])
*/
class EmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'name',
        'last_name',
        'password',
        'email',
        'json_permission',
        'dni_number',
        'employee_type_id',
        'company_id',
        'json_info'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Employee::class;
    }
}
