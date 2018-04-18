<?php

namespace App\Repositories;

use App\Models\LogType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LogTypeRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:58 am UTC
 *
 * @method LogType findWithoutFail($id, $columns = ['*'])
 * @method LogType find($id, $columns = ['*'])
 * @method LogType first($columns = ['*'])
*/
class LogTypeRepository extends BaseRepository
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
        return LogType::class;
    }
}
