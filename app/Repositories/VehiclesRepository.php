<?php

namespace App\Repositories;

use App\Models\Vehicles;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VehiclesRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:59 am UTC
 *
 * @method Vehicles findWithoutFail($id, $columns = ['*'])
 * @method Vehicles find($id, $columns = ['*'])
 * @method Vehicles first($columns = ['*'])
*/
class VehiclesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'plate_code',
        'vehicle_type_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vehicles::class;
    }
}
