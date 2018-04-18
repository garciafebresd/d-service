<?php

namespace App\Repositories;

use App\Models\Chat;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ChatRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:59 am UTC
 *
 * @method Chat findWithoutFail($id, $columns = ['*'])
 * @method Chat find($id, $columns = ['*'])
 * @method Chat first($columns = ['*'])
*/
class ChatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'viewed_at',
        'status',
        'text',
        'calendar_service_id',
        'employee_id',
        'client_id',
        'json_info'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Chat::class;
    }
}
