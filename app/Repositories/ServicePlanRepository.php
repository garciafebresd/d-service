<?php

namespace App\Repositories;

use App\Models\ServicePlan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServicePlanRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:59 am UTC
 *
 * @method ServicePlan findWithoutFail($id, $columns = ['*'])
 * @method ServicePlan find($id, $columns = ['*'])
 * @method ServicePlan first($columns = ['*'])
*/
class ServicePlanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'client_id',
        'service_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ServicePlan::class;
    }
}
