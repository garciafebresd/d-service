<?php

namespace App\Repositories;

use App\Models\ServiceType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServiceTypeRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:59 am UTC
 *
 * @method ServiceType findWithoutFail($id, $columns = ['*'])
 * @method ServiceType find($id, $columns = ['*'])
 * @method ServiceType first($columns = ['*'])
*/
class ServiceTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'description',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ServiceType::class;
    }
}
