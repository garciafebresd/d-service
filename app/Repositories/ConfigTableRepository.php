<?php

namespace App\Repositories;

use App\Models\ConfigTable;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConfigTableRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:58 am UTC
 *
 * @method ConfigTable findWithoutFail($id, $columns = ['*'])
 * @method ConfigTable find($id, $columns = ['*'])
 * @method ConfigTable first($columns = ['*'])
*/
class ConfigTableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ConfigTable::class;
    }
}
