<?php

namespace App\Repositories;

use App\Models\ServiceRatings;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServiceRatingsRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:59 am UTC
 *
 * @method ServiceRatings findWithoutFail($id, $columns = ['*'])
 * @method ServiceRatings find($id, $columns = ['*'])
 * @method ServiceRatings first($columns = ['*'])
*/
class ServiceRatingsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'json_info',
        'calendar_service_id',
        'client_id',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ServiceRatings::class;
    }
}
