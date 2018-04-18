<?php

namespace App\Repositories;

use App\Models\Alerts;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AlertsRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:58 am UTC
 *
 * @method Alerts findWithoutFail($id, $columns = ['*'])
 * @method Alerts find($id, $columns = ['*'])
 * @method Alerts first($columns = ['*'])
*/
class AlertsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'latitude',
        'longitude',
        'alert_type_id',
        'json_info'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Alerts::class;
    }
}
