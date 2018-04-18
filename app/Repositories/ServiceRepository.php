<?php

namespace App\Repositories;

use App\Models\Service;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServiceRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:59 am UTC
 *
 * @method Service findWithoutFail($id, $columns = ['*'])
 * @method Service find($id, $columns = ['*'])
 * @method Service first($columns = ['*'])
*/
class ServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'name',
        'descripcion',
        'price',
        'json_info',
        'service_type_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Service::class;
    }
}
