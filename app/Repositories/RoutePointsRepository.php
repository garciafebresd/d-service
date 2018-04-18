<?php

namespace App\Repositories;

use App\Models\RoutePoints;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoutePointsRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:59 am UTC
 *
 * @method RoutePoints findWithoutFail($id, $columns = ['*'])
 * @method RoutePoints find($id, $columns = ['*'])
 * @method RoutePoints first($columns = ['*'])
*/
class RoutePointsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date_route',
        'calendar_service_id',
        'employee_id',
        'gps_data',
        'gps_status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoutePoints::class;
    }
}
