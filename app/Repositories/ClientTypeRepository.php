<?php

namespace App\Repositories;

use App\Models\ClientType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ClientTypeRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:58 am UTC
 *
 * @method ClientType findWithoutFail($id, $columns = ['*'])
 * @method ClientType find($id, $columns = ['*'])
 * @method ClientType first($columns = ['*'])
*/
class ClientTypeRepository extends BaseRepository
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
        return ClientType::class;
    }
}
