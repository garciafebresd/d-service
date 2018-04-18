<?php

namespace App\Repositories;

use App\Models\Package;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PackageRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:58 am UTC
 *
 * @method Package findWithoutFail($id, $columns = ['*'])
 * @method Package find($id, $columns = ['*'])
 * @method Package first($columns = ['*'])
*/
class PackageRepository extends BaseRepository
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
        return Package::class;
    }
}
