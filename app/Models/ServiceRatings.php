<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServiceRatings
 * @package App\Models
 * @version April 1, 2018, 4:59 am UTC
 *
 * @property \App\Models\CalendarService calendarService
 * @property \App\Models\Client client
 * @property \Illuminate\Database\Eloquent\Collection relClientPaymentMethod
 * @property \Illuminate\Database\Eloquent\Collection relServiceEmployee
 * @property \Illuminate\Database\Eloquent\Collection routePoints
 * @property boolean status
 * @property string json_info
 * @property integer calendar_service_id
 * @property integer client_id
 * @property string description
 */
class ServiceRatings extends Model
{
    use SoftDeletes;

    public $table = 'service_ratings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'status',
        'json_info',
        'calendar_service_id',
        'client_id',
        'employee_id' => 'integer',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'boolean',
        'json_info' => 'string',
        'calendar_service_id' => 'integer',
        'client_id' => 'integer',
        'employee_id' => 'integer',        
        'description' => 'string'
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
