<?php

namespace App\Repositories;

use App\Models\UserType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserTypeRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:59 am UTC
 *
 * @method UserType findWithoutFail($id, $columns = ['*'])
 * @method UserType find($id, $columns = ['*'])
 * @method UserType first($columns = ['*'])
*/
class UserTypeRepository extends BaseRepository
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
        return UserType::class;
    }
}
