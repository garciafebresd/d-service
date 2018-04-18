<?php

namespace App\Repositories;

use App\Models\Notification;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NotificationRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:58 am UTC
 *
 * @method Notification findWithoutFail($id, $columns = ['*'])
 * @method Notification find($id, $columns = ['*'])
 * @method Notification first($columns = ['*'])
*/
class NotificationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'type',
        'name',
        'employee_id',
        'client_id',
        'json_info'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Notification::class;
    }
}
