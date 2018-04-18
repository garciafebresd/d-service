<?php

namespace App\Repositories;

use App\Models\SystemLog;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SystemLogRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:59 am UTC
 *
 * @method SystemLog findWithoutFail($id, $columns = ['*'])
 * @method SystemLog find($id, $columns = ['*'])
 * @method SystemLog first($columns = ['*'])
*/
class SystemLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'description',
        'log_type_id',
        'employee_id',
        'client_id',
        'user_id',
        'json_info',
        'ip_address',
        'uuid',
        'imei',
        'latitude',
        'longitude'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SystemLog::class;
    }
}
