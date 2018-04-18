<?php

namespace App\Repositories;

use App\Models\Clients;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ClientsRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:58 am UTC
 *
 * @method Clients findWithoutFail($id, $columns = ['*'])
 * @method Clients find($id, $columns = ['*'])
 * @method Clients first($columns = ['*'])
*/
class ClientsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'dni',
        'name',
        'last_name',
        'legal_name',
        'phone_number',
        'email_address',
        'address',
        'client_type_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Clients::class;
    }
}
