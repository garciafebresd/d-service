<?php

namespace App\Repositories;

use App\Models\PaymentMethodEnabled;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaymentMethodEnabledRepository
 * @package App\Repositories
 * @version April 1, 2018, 4:59 am UTC
 *
 * @method PaymentMethodEnabled findWithoutFail($id, $columns = ['*'])
 * @method PaymentMethodEnabled find($id, $columns = ['*'])
 * @method PaymentMethodEnabled first($columns = ['*'])
*/
class PaymentMethodEnabledRepository extends BaseRepository
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
        return PaymentMethodEnabled::class;
    }
}
