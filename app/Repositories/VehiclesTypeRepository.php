<?php

namespace App\Repositories;

use App\Models\VehiclesType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VehiclesTypeRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:59 am UTC
 *
 * @method VehiclesType findWithoutFail($id, $columns = ['*'])
 * @method VehiclesType find($id, $columns = ['*'])
 * @method VehiclesType first($columns = ['*'])
*/
class VehiclesTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'name',
        'description',
        'json_data'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return VehiclesType::class;
    }
}
