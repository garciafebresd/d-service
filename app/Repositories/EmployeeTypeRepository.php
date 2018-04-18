<?php

namespace App\Repositories;

use App\Models\EmployeeType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EmployeeTypeRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:58 am UTC
 *
 * @method EmployeeType findWithoutFail($id, $columns = ['*'])
 * @method EmployeeType find($id, $columns = ['*'])
 * @method EmployeeType first($columns = ['*'])
*/
class EmployeeTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EmployeeType::class;
    }
}
