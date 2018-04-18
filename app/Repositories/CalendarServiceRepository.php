<?php

namespace App\Repositories;

use App\Models\CalendarService;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CalendarServiceRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:58 am UTC
 *
 * @method CalendarService findWithoutFail($id, $columns = ['*'])
 * @method CalendarService find($id, $columns = ['*'])
 * @method CalendarService first($columns = ['*'])
*/
class CalendarServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'service_date',
        'client_id',
        'employee_id',
        'service_id',
        'payment_method_id',
        'description',
        'json_info'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CalendarService::class;
    }
}
