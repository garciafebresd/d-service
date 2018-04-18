<?php

namespace App\Repositories;

use App\Models\Survey;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SurveyRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:59 am UTC
 *
 * @method Survey findWithoutFail($id, $columns = ['*'])
 * @method Survey find($id, $columns = ['*'])
 * @method Survey first($columns = ['*'])
*/
class SurveyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'questions',
        'status',
        'description',
        'employee_id',
        'client_id',
        'json_info'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Survey::class;
    }
}
