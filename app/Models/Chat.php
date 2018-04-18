<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Chat
 * @package App\Models
 * @version April 1, 2018, 4:59 am UTC
 *
 * @property \App\Models\CalendarService calendarService
 * @property \App\Models\Client client
 * @property \App\Models\Employee employee
 * @property \Illuminate\Database\Eloquent\Collection relClientPaymentMethod
 * @property \Illuminate\Database\Eloquent\Collection relServiceEmployee
 * @property \Illuminate\Database\Eloquent\Collection routePoints
 * @property \Illuminate\Database\Eloquent\Collection serviceRatings
 * @property string|\Carbon\Carbon viewed_at
 * @property boolean status
 * @property string text
 * @property integer calendar_service_id
 * @property integer employee_id
 * @property integer client_id
 * @property string json_info
 */
class Chat extends Model
{
    use SoftDeletes;

    public $table = 'chat';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'viewed_at',
        'status',
        'text',
        'calendar_service_id',
        'employee_id',
        'client_id',
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
        'text' => 'string',
        'calendar_service_id' => 'integer',
        'employee_id' => 'integer',
        'client_id' => 'integer',
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
    public function calendarService()
    {
        return $this->belongsTo(\App\Models\CalendarService::class);
    }

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
}
