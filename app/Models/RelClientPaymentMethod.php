<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RelClientPaymentMethod
 * @package App\Models
 * @version April 1, 2018, 4:59 am UTC
 *
 * @property \App\Models\Client client
 * @property \App\Models\PaymentMethod paymentMethod
 * @property \Illuminate\Database\Eloquent\Collection relServiceEmployee
 * @property \Illuminate\Database\Eloquent\Collection routePoints
 * @property \Illuminate\Database\Eloquent\Collection serviceRatings
 * @property integer client_id
 * @property integer payment_method_id
 * @property boolean status
 */
class RelClientPaymentMethod extends Model
{
    use SoftDeletes;

    public $table = 'rel_client_payment_method';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'client_id',
        'payment_method_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'payment_method_id' => 'integer',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paymentMethod()
    {
        return $this->belongsTo(\App\Models\PaymentMethod::class);
    }
}
