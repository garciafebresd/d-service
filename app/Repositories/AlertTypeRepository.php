<?php

namespace App\Repositories;

use App\Models\AlertType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AlertTypeRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:58 am UTC
 *
 * @method AlertType findWithoutFail($id, $columns = ['*'])
 * @method AlertType find($id, $columns = ['*'])
 * @method AlertType first($columns = ['*'])
*/
class AlertTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AlertType::class;
    }
}
