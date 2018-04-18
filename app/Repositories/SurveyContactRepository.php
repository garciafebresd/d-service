<?php

namespace App\Repositories;

use App\Models\SurveyContact;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SurveyContactRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:59 am UTC
 *
 * @method SurveyContact findWithoutFail($id, $columns = ['*'])
 * @method SurveyContact find($id, $columns = ['*'])
 * @method SurveyContact first($columns = ['*'])
*/
class SurveyContactRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'survey_id',
        'contact_info',
        'update_at',
        'json_info'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SurveyContact::class;
    }
}
