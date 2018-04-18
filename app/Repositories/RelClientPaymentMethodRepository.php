<?php

namespace App\Repositories;

use App\Models\RelClientPaymentMethod;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RelClientPaymentMethodRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:59 am UTC
 *
 * @method RelClientPaymentMethod findWithoutFail($id, $columns = ['*'])
 * @method RelClientPaymentMethod find($id, $columns = ['*'])
 * @method RelClientPaymentMethod first($columns = ['*'])
*/
class RelClientPaymentMethodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_id',
        'payment_method_id',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RelClientPaymentMethod::class;
    }
}
