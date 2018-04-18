<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CalendarService
 * @package App\Models
 * @version April 1, 2018, 4:58 am UTC
 *
 * @property \App\Models\Client client
 * @property \App\Models\Employee employee
 * @property \App\Models\PaymentMethod paymentMethod
 * @property \App\Models\Service service
 * @property \Illuminate\Database\Eloquent\Collection Chat
 * @property \Illuminate\Database\Eloquent\Collection relClientPaymentMethod
 * @property \Illuminate\Database\Eloquent\Collection relServiceEmployee
 * @property \Illuminate\Database\Eloquent\Collection RoutePoint
 * @property \Illuminate\Database\Eloquent\Collection ServiceRating
 * @property boolean status
 * @property string|\Carbon\Carbon service_date
 * @property integer client_id
 * @property integer employee_id
 * @property integer service_id
 * @property integer payment_method_id
 * @property string description
 * @property string json_info
 */
class CalendarService extends Model
{
    use SoftDeletes;

    public $table = 'calendar_service';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'status',
        'service_date',
        'client_id',
        'employee_id',
        'service_id',
        'payment_method_id',
        'description',
        'json_info'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'boolean',
        'client_id' => 'integer',
        'employee_id' => 'integer',
        'service_id' => 'integer',
        'payment_method_id' => 'integer',
        'description' => 'string',
        'json_info' => 'string'
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
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paymentMethod()
    {
        return $this->belongsTo(\App\Models\PaymentMethod::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function chats()
    {
        return $this->hasMany(\App\Models\Chat::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function routePoints()
    {
        return $this->hasMany(\App\Models\RoutePoint::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function serviceRatings()
    {
        return $this->hasMany(\App\Models\ServiceRating::class);
    }
}
