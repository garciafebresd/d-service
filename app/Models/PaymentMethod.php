<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PaymentMethod
 * @package App\Models
 * @version April 1, 2018, 4:58 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection CalendarService
 * @property \Illuminate\Database\Eloquent\Collection RelClientPaymentMethod
 * @property \Illuminate\Database\Eloquent\Collection relServiceEmployee
 * @property \Illuminate\Database\Eloquent\Collection routePoints
 * @property \Illuminate\Database\Eloquent\Collection serviceRatings
 */
class PaymentMethod extends Model
{
    use SoftDeletes;

    public $table = 'payment_method';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function calendarServices()
    {
        return $this->hasMany(\App\Models\CalendarService::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function relClientPaymentMethods()
    {
        return $this->hasMany(\App\Models\RelClientPaymentMethod::class);
    }
}
