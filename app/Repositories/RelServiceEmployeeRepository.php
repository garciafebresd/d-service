<?php

namespace App\Repositories;

use App\Models\RelServiceEmployee;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RelServiceEmployeeRepository
 * @package App\Repositories
 * @version April 1, 2018, 5:00 am UTC
 *
 * @method RelServiceEmployee findWithoutFail($id, $columns = ['*'])
 * @method RelServiceEmployee find($id, $columns = ['*'])
 * @method RelServiceEmployee first($columns = ['*'])
*/
class RelServiceEmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'service_id',
        'employee_id',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RelServiceEmployee::class;
    }
}
