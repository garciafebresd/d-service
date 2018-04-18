<?php

namespace App\Repositories;

use App\Models\PaymentMethod;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaymentMethodRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:58 am UTC
 *
 * @method PaymentMethod findWithoutFail($id, $columns = ['*'])
 * @method PaymentMethod find($id, $columns = ['*'])
 * @method PaymentMethod first($columns = ['*'])
*/
class PaymentMethodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PaymentMethod::class;
    }
}
